<?php
class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = 'sales/quote';
        $this->resourceClass = "Sales_Model_Resource_Quote";
        $this->collectionClass = "Sales_Model_Resource_Collection_Quote";
    }

    public function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection()->getData() as $_item) {
            $grandTotal += $_item->getRowTotal();
        }
        $this->addData('grand_total', $grandTotal);
    }
    public function initQuote()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        // $quoteId = ($quoteId) ? $quoteId : 0;
        $quoteId = (!$quoteId) ? 0 : $quoteId;
        $this->load($quoteId);
        if (!$this->getId()) {
            $quote = Mage::getModel('sales/quote')
                ->setData(
                    [
                        "tax_percent" => 0,
                        "grand_total" => 0
                    ]
                )->save();
            Mage::getSingleton('core/session')->set('quote_id', $quote->getId());
            $this->load($quote->getId());
        }

    }

    public function addProduct($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')
                ->addItem($this, $data['product_id'], $data['qty']);
            $this->save();
        }
        /*   if($this->getId()){ why is this line important
              Mage::getModel('sales/quote_item')->addItem($this,$data['product_id'],$data['quantity']);
              $this->save();
          } */
    }

    public function getItemCollection()
    {
        $quote = Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
        return $quote;
    }

    //new
    public function addShipping($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            // print_r($this->getId());
            Mage::getModel('sales/quote_shipping')
                ->setData($data)
                ->addData('quote_id', $this->getId())
                ->save();
        }
        return $this;

    }

    public function addShipId($shipId)
    {
        $this->initQuote();
        if ($this->getId()) {
            $this->addData('shipping_id', $shipId)
                ->save();
        }
        // return $this;

    }

    public function addPayment($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_payment')
                ->setData($data)
                ->addData('quote_id', $this->getId())
                ->save();
        }
        return $this;
    }

    public function addPayId($payId)
    {

        $this->initQuote();
        if ($this->getId()) {
            $this->addData('payment_id', $payId)
                ->save();
        }
        // return $this;

    }


    public function addCustomer($data)
    {
        $this->initQuote();
        $quoteCustomer = Mage::getModel('sales/quote_customer');
        $quoteCustomerData = $quoteCustomer->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        $quoteCustomerId = ($quoteCustomerData && $quoteCustomerData->getId())
            ? $quoteCustomerData->getId() : 0;
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $customerEmail = Mage::getModel('customer/customer')->load($customerId)->getCustomerEmail();

        if ($this->getId()) {

            $quoteCustomer->setData($data)
                ->addData('quote_customer_id', $quoteCustomerId)
                ->addData('quote_id', $this->getId())
                ->addData('customer_id', $customerId)
                ->addData('email', $customerEmail)
                ->save();
        }
    }

    public function getCustomer()
    {
        return Mage::getModel('customer/customer')->getCollection();
    }

    public function convert()
    {
        $this->initQuote();
        if ($this->getId()) {
            $order = $this->convertQuoteToOrder();
            $orderId = $order->getId();
            // print_r($orderId);
            $customer = $this->convertCustomer($orderId);
            $item = $this->convertItem($orderId);
            $shipping = $this->convertShipping($orderId);
            $payment = $this->convertPayment($orderId);
            $orderShipping=Mage::getSingleton('sales/quote')->addShipId($shipping->getId());
            $orderPayment=Mage::getSingleton('sales/quote')->addPayId($payment->getId());

            $this->addData('order_id', $orderId)
                 ->addData('shipping_id',$orderShipping)
                 ->addData('payment_id',$orderPayment)
                ->save();
        }
    }

    public function convertQuoteToOrder()
    {

        return Mage::getModel('sales/order')
            ->setData($this->getData())
            ->removeData('quote_id')
            ->removeData('order_id')
            ->removeData('shipping_id')
            ->removeData('payment_id')
            ->save();
    }

    public function convertCustomer($orderId)
    {
        if ($this->getId()) {
            $customerData = Mage::getModel('sales/quote_customer')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();

            return Mage::getModel('sales/order_customer')
                ->setData($customerData->getData())
                ->removeData('quote_customer_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }

    }

    public function convertItem($orderId)
    {
        foreach ($this->getItemCollection()->getData() as $item) {
            // print_r($this->getItemCollection());
            // print_r($item);
            // echo "okay"."<br>";
            // print_r($item->getData());
            Mage::getModel('sales/order_item')
                ->setData($item->getData())
                ->removeData('item_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
        return $this;
    }

    public function convertShipping($orderId)
    {
        if ($this->getId()) {
            $paymentData = Mage::getModel('sales/quote_shipping')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();

            return Mage::getModel('sales/order_shipping')
                ->setData($paymentData->getData())
                ->removeData('shipping_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }

    }
    public function convertPayment($orderId)
    {
        if ($this->getId()) {
            $shippingData = Mage::getModel('sales/quote_payment')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();

            return Mage::getModel('sales/order_payment')
                ->setData($shippingData->getData())
                ->removeData('payment_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
    }

}

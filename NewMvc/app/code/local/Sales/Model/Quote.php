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
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');

        // $quoteId = ($quoteId) ? $quoteId : 0;
        $quoteId = (!$quoteId) ? 0 : $quoteId;
        $customerId = (!$customerId) ? 0 : $customerId;
        $this->load($quoteId);
        if (!$this->getId()) {
            $quote = Mage::getModel('sales/quote')
                ->setData(
                    [
                        "tax_percent" => 0,
                        "grand_total" => 0
                    ]
                );
            // ->save();
            if (!is_null($this->quoteCollection())) {
                $quoteId = $this->quoteCollection()->getQuoteId();
                $quote->addData('quote_id', $quoteId);
            }
            $quote->save();

            Mage::getSingleton('core/session')->set('quote_id', $quote->getId());
            $this->load($quote->getId());
        }
        else{
            if($customerId!=0){
                $quote=Mage::getSingleton('sales/quote')->load($this->getId());//idhar model karenge to kya hoga
                $quote->addData('customer_id',$customerId)
                ->save();
                $quoteId = $quote->getId();
                // ye kyu kiya
            }
            $this->load($quoteId);
        }
        // return $this //ye kyu kiya


    }

    public function quoteCollection()
    {
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $customerId = (!$customerId) ? 0 : $customerId;
        if ($customerId != 0) {
            return Mage::getSingleton('sales/quote')->
                getCollection()
                ->addFieldToFilter('customer_id', $customerId)
                ->addFieldToFilter('order_id', 0)
                ->addFieldToOrderBy(['quote_id' => 'DESC'])
                ->getFirstItem();
        } else {
            return null;
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
        $shipping = Mage::getModel('sales/quote_shipping');
        $shippingData = $shipping->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        $shippingId = ($shippingData && $shippingData->getId()) ? $shippingData->getId() : 0;
        if ($this->getId()) {
            // print_r($this->getId());
            return Mage::getModel('sales/quote_shipping')
                ->setData($data)
                ->addData('quote_id', $this->getId())
                ->addData('shipping_id', $shippingId)
                ->save();
        }
        // return $this;

    }
    public function addPayment($data)
    {
        $this->initQuote();
        $payment = Mage::getModel('sales/quote_payment');
        $paymentData = $payment->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        $paymentId = ($paymentData && $paymentData->getId()) ? $paymentData->getId() : 0;

        if ($this->getId()) {
            return Mage::getModel('sales/quote_payment')
                ->setData($data)
                ->addData('quote_id', $this->getId())
                ->addData('payment_id', $paymentId)
                ->save();
        }
        // return $this;
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
            $orderShippingId = $shipping->getId();
            $payment = $this->convertPayment($orderId);
            $orderPaymentId = $payment->getId();
            $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');//ese hi lena hai ya sales/quote ke singleton se

            $order->addData('payment_id', $orderPaymentId)->save();
            $order->addData('shipping_id', $orderShippingId)->save();
            $this->addData('order_id', $orderId)
                // ->addData('customer_id', $customerId)
                // ->addData('shipping_id', $orderShipping)
                // ->addData('payment_id', $orderPayment)
                ->save();
        }
    }

    public function convertQuoteToOrder()
    {
        $defaultStatus=Sales_Model_Status::DEFAULT_ORDER_STATUS;
        
        return Mage::getModel('sales/order')
            ->setData($this->getData())
            ->removeData('quote_id')
            ->removeData('order_id')
            ->removeData('shipping_id')
            ->removeData('payment_id')
            //new
            ->addData('status_method',$defaultStatus)
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

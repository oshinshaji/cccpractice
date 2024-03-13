<?php
class Sales_Block_Quote_Checkout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('sales/quote/checkout.phtml');

    }
    public function getProduct()
    {
        return Mage::getModel('catalog/product')
            ->load($this->getRequest()->getParams('id', 0));
    }

    public function getItem()
    {
        $quote = $this->getQuote();
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $quote->getId())->getData();
    }

    public function getQuote()
    {
        return Mage::getModel('sales/quote')
            ->load($this->getRequest()->getParams('id', 0));
    }
    public function getQuoteCustomer()
    {
    //    print_r(Mage::getModel('sales/quote_customer'));
        return Mage::getModel('sales/quote_customer')
            ->load($this->getRequest()->getParams('id', 0));
    }

    public function getCustomer()
    {
       return Mage::getModel('customer/customer')->getCollection();
    }
}
?>
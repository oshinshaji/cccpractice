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
        return Mage::getSingleton('sales/quote')
        ->getItemCollection()->getData() ;
    }

    public function getQuote()
    {
       $quoteModel = Mage::getSingleton('sales/quote');
        $quoteModel->initQuote();
        return $quoteModel;
    }
    public function getQuoteCustomer()
    {
        return Mage::getModel('sales/quote_customer')
            ->load($this->getRequest()->getParams('id', 0));
    }

    public function getCustomer()
    {
        return Mage::getModel('customer/customer')->getCollection();
    }
 
}
?>
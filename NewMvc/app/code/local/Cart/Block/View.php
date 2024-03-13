<?php
class Cart_Block_View extends Core_Block_Template{
  public function __construct(){
    $this->setTemplate('sales/cart/view.phtml');
  }

  public function getProduct()
  {
      return Mage::getModel('catalog/product')
          ->load($this->getRequest()->getParams('id', 0));
  }

  public function getItem(){
    $quote=$this->getQuote();
    return Mage::getModel('sales/quote_item')->getCollection()
    ->addFieldToFilter('quote_id', $quote->getId())->getData();
  }

  public function getQuote(){

    return Mage::getModel('sales/quote')
          ->load($this->getRequest()->getParams('id', 0));

  }
}
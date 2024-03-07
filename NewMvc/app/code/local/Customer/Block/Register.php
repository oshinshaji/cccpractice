<?php
class Customer_Block_Register extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/register/form.phtml');
    }
    public function getCustomer()
    {
        return Mage::getModel('customer/customer')
            ->load($this->getRequest()->getParams('id', 0));
    }
}
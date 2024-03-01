<?php
class Customer_Block_Dashboard extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/dashboard/list.phtml');
    }
    public function getCustomer()
    {
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        // echo $customerId;
        return Mage::getModel('customer/customer')->load($customerId);
        /*   check this
           return Mage::getSingleton("customer/customer")
             ->load(Mage::getSingleton("core/session")
             ->get("logged_in_customer_id")); */

    }
}
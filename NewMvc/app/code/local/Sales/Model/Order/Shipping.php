<?php

class Sales_Model_Order_Shipping extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass='sales/order_shipping';
        $this->resourceClass='Sales_Model_Resource_Order_Shipping';
        $this->collectionClass='Sales_Model_Resource_Collection_Shipping';
    }
}
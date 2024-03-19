<?php
class Sales_Model_Resource_Order_Customer extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName='sales_order_customer';
        $this->_primaryKey='order_customer_id';
    }
}
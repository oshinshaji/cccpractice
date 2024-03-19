<?php
class Sales_model_Resource_Order_Payment extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName='sales_order_payment_method';
        $this->_primaryKey='payment_id';
    }
}
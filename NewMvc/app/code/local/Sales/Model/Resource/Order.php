<?php
class Sales_Model_Resource_Order extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName='sales_order';
        $this->_primaryKey='order_id';
    }
    
}
<?php
class Sales_Model_Resource_Order_Shipping extends Core_Model_Resource_Abstract{

    public function init(){
        $this->_tableName='sales_order_shipping_method';
        $this->_primaryKey='shipping_id';
    }

}
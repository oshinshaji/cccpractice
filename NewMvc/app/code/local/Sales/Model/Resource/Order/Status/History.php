<?php
class Sales_Model_Resource_Order_Status_History extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName='sales_order_status_history';
        $this->_primaryKey='history_id';
    }
}
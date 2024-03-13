<?php
class Sales_Model_Resource_Quote extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName='sales_quote';
        $this->_primaryKey='quote_id';
    }
    
}
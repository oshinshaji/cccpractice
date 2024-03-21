<?php
class Sales_Model_Resource_Status extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName='status';
        $this->_primaryKey='status_id';
    }
}
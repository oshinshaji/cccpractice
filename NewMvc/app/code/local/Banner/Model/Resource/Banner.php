<?php 
class Banner_Model_Resource_Banner extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName= "banner";
        $this->_primaryKey= "banner_id";
    }

    
}
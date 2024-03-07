<?php
class Banner_Model_Banner extends Core_Model_Abstract{
    public function init(){
        
        $this->resourceClass="Banner_Model_Resource_Banner";
        $this->collectionClass="Banner_Model_Resource_Collection_Banner";
        $this->_modelClass="banner/banner";
    }
    
}
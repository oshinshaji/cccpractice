<?php
class Customer_Model_Customer extends Core_Model_Abstract{
    
    public function init(){
        
        $this->resourceClass="Customer_Model_Resource_Customer";
        $this->collectionClass="Customer_Model_Resource_Collection_Customer";
        $this->_modelClass="customer/customer";

    }

/*     public function getStatus() {
        $mapping = [1=>'Enabled',0=>'Disabled'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];

        }
    }

    public function getCategoryId() {
        $mapping = [1=>'bargame',2=>'bedroom',3=>'decor',4=>'diningkitchen',5=>'lighting',6=>'livingroom',7=>'mattresses',8=>'office',9=>'outdoor',];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['category_id']];

        }
    } */
    
}
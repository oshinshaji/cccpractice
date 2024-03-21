<?php 
class Sales_Model_Status extends Core_Model_Abstract{

    const DEFAULT_ORDER_STATUS=1;
    const DEFAULT_ORDER_STATUS_TEXT='Pending';


    public function init(){
        $this->_modelClass='sales/status';
        $this->resourceClass='Sales_Model_Resource_Status';
        $this->collectionClass='Sales_Model_Resource_Collection_Status';
    }

    public function getStatusOptions(){
        return array(
            'pending' => 'Pending',
            'shipped'=>'Shipping',
            'outForDelivery'=>'Out For Delivery',
            'arrived' => 'Arrived',
            'collected'=>'Collected'
        );
    }
    
}
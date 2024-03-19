<?php
//new file
class Sales_Model_Quote_Payment extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass='sales/quote_payment';
        $this->resourceClass='Sales_Model_Resource_Quote_Payment';
        $this->collectionClass='Sales_Model_Resource_Collection_Quote_Payment';
    }
}
?>
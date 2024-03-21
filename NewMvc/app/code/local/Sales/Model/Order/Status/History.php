<?php
class Sales_Model_Order_Status_History extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass='sales/order_status_history';
        $this->resourceClass='Sales_Model_Resource_Order_Status_History';
        $this->collectionClass='Sales_Model_Resource_Collection_Order_Status_History';
    }

    public function getLastToStatus()
    {
        $model = Mage::getModel("sales/order_status_history")->getCollection()
            ->addFieldToOrderBy(['order_id' => 'DESC']);
        $count = Mage::getModel("sales/order_status_history")->getCollection()
            ->addFieldToLimit([1]);
        if (empty($count->getData())) {
            return null;
        }

        return $model->getFirstItem();
    }
}
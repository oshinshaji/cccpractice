<?php
class Chatting_Model_Chatting extends Core_Model_Abstract{
    public function init()
    {
        $this->resourceClass = "Chatting_Model_Resource_Chatting";
        $this->collectionClass = "Chatting_Model_Resource_Collection_Chatting";
        $this->_modelClass = "chatting/chatting";
    }

    public function getLastUser(){
        $model=Mage::getModel('chatting/model');
        $getData = $model->getData();

            $sql = $this->insertSql($this->getTableName(), $getData);
            $id = $this->getResource()->getAdapter()->insert($sql);
            $model->setId($id);
        }
}

<?php
class Chatting_Model_Chatting extends Core_Model_Abstract
{
    public function init()
    {
        $this->resourceClass = "Chatting_Model_Resource_Chatting";
        $this->collectionClass = "Chatting_Model_Resource_Collection_Chatting";
        $this->_modelClass = "chatting/chatting";
    }

    public function getLastUser()
    {
        $model = Mage::getModel("chatting/chatting")->getCollection()
            ->addFieldToOrderBy(['id' => 'DESC']);
        $count = Mage::getModel("chatting/chatting")->getCollection()
            ->addFieldToLimit([1]);
        if (empty($count->getData())) {
            return null;
        }

        return $model->getFirstItem();
    }
    

}

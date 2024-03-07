<?php
class Chatting_Model_Resource_Chatting extends Core_Model_Resource_Abstract{
    protected $_tableName = null;
    protected $_primaryKey = null;
    public function init()
    {
        $this->_tableName = "ccc_chatting";
        $this->_primaryKey = "id";
    }

    /* public function getLastUser(){
        $model=Mage::getModel('chatting/model');
        $getData = $model->getData();

            $sql = $this->insertSql($this->getTableName(), $getData);
            $id = $this->getAdapter()->insert($sql);
            $model->setId($id);
        } */
    }

    

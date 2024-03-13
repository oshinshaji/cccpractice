<?php
class Chatting_Model_Resource_Chatting extends Core_Model_Resource_Abstract{
    protected $_tableName = null;
    protected $_primaryKey = null;
    public function init()
    {
        $this->_tableName = "ccc_chatting";
        $this->_primaryKey = "id";
    }

    }

    

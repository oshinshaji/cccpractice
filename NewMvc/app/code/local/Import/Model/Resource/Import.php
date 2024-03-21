<?php
class Import_Model_Resource_Import extends Core_Model_Resource_Abstract
{
    protected $_tableName = null;
    protected $_primaryKey = null;
    public function init()
    {
        $this->_tableName = "import_data";
        $this->_primaryKey = "import_id";
    }

}
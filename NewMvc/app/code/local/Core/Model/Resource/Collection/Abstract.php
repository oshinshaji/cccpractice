<?php
class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null;
    protected $_select = [];
    protected $_isLoaded = false;
    protected $_modelClass = null;

    protected $_data = [];

    public function setResource(Core_Model_Resource_Abstract $resource)
    {
        $this->_resource = $resource;
        return $this;
    }
    public function setModelClass($modelClass)
    {
        $this->_modelClass = $modelClass;
    }
    public function getData()
    {

        if (!$this->_isLoaded) {
            $this->load();
        }
        // print_r($this->_data);

        return $this->_data;
    }


    public function select()
    {
        $this->_select['from'] = $this->_resource->getTableName();
        // print_r($this->_select['from']);
        return $this;
    }
    public function addFieldToFilter($column, $filter)
    {
        $this->_select['where'][$column][] = $filter;
        return $this;
    }

    public function where()
    {
        $whereCondition = [];
        foreach ($this->_select['where'] as $_field => $_filters) {
            foreach ($_filters as $_value) {
                if (!is_array($_value)) {
                    $_value = ['eq' => $_value];
                }
                foreach ($_value as $_k => $_v) {
                    switch ($_k) {
                        case 'gt':
                            $whereCondition[] = "`$_field` > '{$_v}'";
                            break;
                        case 'in':
                            $whereCondition[] = "`$_field` IN ( '{$_v}') ";
                            break;
                        case 'eq':
                            $whereCondition[] = "`$_field` = '{$_v}' ";
                            break;
                        case 'between':
                            $_v = explode(',', $_v);
                            $whereCondition[] = "`$_field` BETWEEN '{$_v[0]}' AND '{$_v[1]}' ";
                            break;
                    }
                }
            }

        }
        $whereCondition = implode(" AND ", $whereCondition);
        return $whereCondition;
    }
    public function orderBy()
    {


    }

    public function groupBy()
    {

    }
    public function load()
    {
        $sql = "SELECT * FROM {$this->_select['from']} ";
        if (isset($this->_select['where']) && count($this->_select['where'])) {

            /* $whereCondition = [];
            foreach ($this->_select['where'] as $_field => $_filters) {
                foreach ($_filters as $_value) {
                    if (!is_array($_value)) {
                        $_value = ['eq' => $_value];
                    }
                    foreach ($_value as $_k => $_v) {
                        switch ($_k) {
                            case 'gt':
                                $whereCondition[] = "`$_field` > '{$_v}'";
                                break;
                            case 'in':
                                $whereCondition[] = "`$_field` IN ( '{$_v}') ";
                                break;
                            case 'eq':
                                $whereCondition[] = "`$_field` = '{$_v}' ";
                                break;
                            case 'between':
                                $_v = explode(',', $_v);
                                $whereCondition[] = "`$_field` BETWEEN '{$_v[0]}' AND '{$_v[1]}' ";
                                break;
                        }
                    }
                }

            }
            $whereCond = implode(" AND ", $whereCondition);*/
            $sql .= "WHERE {$this->where()}";

        }
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $this->_data[] = Mage::getModel($this->_modelClass)->setData($row);
        }
        $this->_isLoaded = true;
        // print_r($this->_select);
        return $this;
    }
}
?>
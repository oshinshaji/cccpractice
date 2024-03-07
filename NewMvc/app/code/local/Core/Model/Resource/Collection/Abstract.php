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
    public function addFieldToOrderBy($filter)
    {
        $this->_select['orderBy'][] = $filter;
        return $this;
    }
    public function addFieldToGroupBy($column, $filter)
    {
        $this->_select['groupBy'][$column][] = $filter;
        print_r($this->_select['groupBy']);
        return $this;
    }
    public function addFieldToLimit($limit)
    {
        $this->_select['limit'] = $limit;
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
                        case 'like':
                            $whereCondition[] = "`$_field` LIKE '{$_v}' ";
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
        $orderByCondition = [];

        foreach ($this->_select['orderBy'] as $_k => $_v) {
            $orderByCondition[] = $_v;
        }
        $orderByCondition = implode(" ", $orderByCondition);
        // print_r($orderByCondition);
        return $orderByCondition;


    }
    public function limit()
    {
        $limitCondition = [];

        foreach ($this->_select['limit'] as $_k => $_v) {
            $limitCondition[] = $_v;
        }
        $limitCondition = implode(" ", $limitCondition);
        return $limitCondition;


    }

    public function groupBy()
    {
        $groupBy = [];
        $groupByCondition = [];
        foreach ($this->_select['groupBy'] as $_field => $_filters) {
            $groupBy[] = $_field;

            foreach ($_filters as $_value) {
                foreach ($_value as $_k => $_v) {
                    echo $_v;
                    switch ($_k) {
                        case 'AVG':
                        case 'MAX':
                        case 'MIN':
                        case 'COUNT':
                            $groupByCondition[] = "$_k($_v)";
                            print_r($groupByCondition);
                            break;
                        default:
                            $groupByCondition[] = $_v;
                            break;
                    }
                }
            }
        }
        print_r($groupBy);
        $groupByCondition = implode(" ,", $groupByCondition);
        $groupBy[] = $groupByCondition;
        // print_r($groupBy);
        return $groupBy;

    }
    public function load()
    {
        $sql = "SELECT * ";
        if (isset($this->_select["groupBy"]) && count($this->_select['groupBy'])) {
            $groupBy = $this->groupBy();
            $sql .= ", {$groupBy[1]} FROM {$this->_select['from']} GROUP BY  {$groupBy[0]}";
        } else {
            $sql = "SELECT * FROM {$this->_select['from']} ";
            if (isset($this->_select['where']) && count($this->_select['where'])) {
                $sql .= "WHERE {$this->where()}";

            }
            if (isset($this->_select['orderBy']) && count($this->_select['orderBy'])) {
                $sql .= "ORDER BY {$this->orderBy()} ASC";

            }
            if (isset($this->_select['limit']) && count($this->_select['limit'])) {
                $sql .= "LIMIT  {$this->limit()}";

            }
            echo "here";
            echo $sql;
        }


        echo $sql;

        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $this->_data[] = Mage::getModel($this->_modelClass)->setData($row);
        }
        $this->_isLoaded = true;

        return $this;
    }
}
?>
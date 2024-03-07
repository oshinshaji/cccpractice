<?php
class Core_Model_Resource_Abstract
{
    protected $_tableName = null;
    protected $_primaryKey = null;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

    }

    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    public function getTableName()
    {
        return $this->_tableName;
    }

    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }
    public function load($id, $column = null)
    {
        $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id} LIMIT 1";
        return $this->getAdapter()->fetchRow($sql);
    }

    public function save(Core_Model_Abstract $model)
    {
        $getData = $model->getData();
    
        if(isset($getData[$this->getPrimaryKey()]) && !empty($getData[$this->getPrimaryKey()]))
        {
            unset($getData[$this->getPrimaryKey()]);
          $sql = $this->updateSql(
                $this->getTableName(),
                $getData,
                [$this->getPrimaryKey() => $model->getId()]
            );
            $id = $this->getAdapter()->update($sql);
            // echo "here";

        }
         else {

            $sql = $this->insertSql($this->getTableName(), $getData);
            $id = $this->getAdapter()->insert($sql);
            $model->setId($id);
        }

    }

    /* public function save(Catalog_Model_Product $product)
    {
        echo 777;
        $data=$product->getData();
        
        //if(isset($data[$this->getPrimaryKey()]))
        if(isset($data[$this->getPrimaryKey()]) && !empty($data[$this->getPrimaryKey()]))
        {
            unset($data[$this->getPrimaryKey()]);
            $sql= $this->updateSql($this->getTableName(),$data,[$this->getPrimaryKey()=>$product->getId()]);
            
            $res= $this->getAdapter()->update($sql);
        }
        else
        {
            
            $sql= $this->insertSql($this->getTableName(),$data);
            //echo $sql;die();
            $id= $this->getAdapter()->insert($sql);
            //print_r($product);
            $product->setId($id);

        }} */
        
    public function insertSql($tablename, $data)
    {
        $columns = [];
        $values = [];
        foreach ($data as $field => $value) {
            $columns[] = "`{$field}`";
            $values[] = "'" . addslashes($value) . "' ";
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        return "INSERT INTO {$tablename} ({$columns}) VALUES ({$values});";
    }


    //delete

    public function delete(Core_Model_Abstract $model)
    {
       echo $sql = $this->deleteSql($this->getTableName(),[$this->getPrimaryKey() => $model->getId()] );
        $this->getAdapter()->delete($sql);


    }
    public function deleteSql($tablename, $where)
    {

        $where_condition = [];
        foreach ($where as $key => $value) {
            $where_condition[] = "`{$key}` =" . "'" . addslashes($value) . "'";
        }
        $where_condition = implode($where_condition);
        return "DELETE FROM {$tablename} WHERE {$where_condition};";
    }

    //update

    public function update($id)
    {


    }
    public function updateSql($tablename, $data, $where)
    {
        $cols = [];
        $where_condition = [];
        foreach ($data as $key => $value) {
            $cols[] = "`{$key}` =" . "'" . addslashes($value) . "'";
        }
        $cols = implode(",", $cols);
        foreach ($where as $key => $value) {
            $where_condition[] = "`{$key}`=" . "'" . addslashes($value) . "'";
        }
        $where_condition = implode(",", $where_condition);
        return "UPDATE {$tablename} SET {$cols} WHERE {$where_condition};";
    }




}
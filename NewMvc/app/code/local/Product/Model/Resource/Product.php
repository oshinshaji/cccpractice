<?php
class Product_Model_Resource_Product {
    protected $_tableName=null;
    protected $_primaryKey=null;
    protected $id=null;
    public function __construct(){
        $this->init();
    }

    //Above all code move to resoucre abstract
    public function init(){
        $this->_tableName= "ccc_product";
        $this->_primaryKey= "product_id";
        $this->id="1";

    }
    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

    public function getTableName(){
        return $this->_tableName;

    }
    public function getAdapter(){
        return new Core_Model_DB_Adapter();
    }

    public function load($id,$column){
        $sql= "SELECT * FROM {$this->_tableName} 
        WHERE {$this->_primaryKey} ={$id} LIMIT 1";
        // echo $sql;
        return $this->getAdapter()->fetchRow($sql);
    }


}
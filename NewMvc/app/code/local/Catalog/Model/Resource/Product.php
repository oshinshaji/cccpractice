<?php
class Catalog_Model_Resource_Product extends Core_Model_Resource_Abstract{
    protected  $_tableName=null;
    protected $_primaryKey=null;
    
  /*   public function __construct(){
        $this->init();
    } */

    public function init(){
        $this->_tableName= "catalog_product";
        $this->_primaryKey= "product_id";
    }

   /*  public function getPrimaryKey(){
        return $this->_primaryKey;
    }
    public function getTableName(){
        return $this->_tableName;
    }

    public function getAdapter(){
        return new Core_Model_DB_Adapter();
    }
    public function load($id,$column=null){
        $sql="SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id} LIMIT 1";
        // echo $sql;
        return $this->getAdapter()->fetchRow($sql);
    }

    public function save(Catalog_Model_Product $product){
        echo "hereeeeeeeeeee";
        $getData=$product->getData();
        if(isset($getData[$this->getPrimaryKey()])){
            unset($getData[$this->getPrimaryKey()]);
        }
     $sql=$this->insertSql($this->getTableName(),$getData);
     echo $sql;
     $id= $this->getAdapter()->insert($sql);
     $product->setId($id);
    //  print_r($product);
    //  die();

    }
    public function insertSql($tablename,$data){
        $columns=[];
        $values=[];
        foreach($data as $field =>$value){
            $columns[]="`{$field}`";
            $values[]="'" .addslashes($value)."' ";
        }
        $columns=implode(",",$columns);
        $values=implode(",",$values);
        return "INSERT INTO {$tablename} ({$columns}) VALUES ({$values});";
    } 
public function update($tablename,$data,$where){
        $cols=[];
        $where_condition=[];
        foreach($data as $key=>$value){
            $cols[]="`{$key}` ="."'".addslashes($value)."'";
        }
        $cols=implode(",",$cols);
        foreach($where as $key=>$value){
            $where_condition[]="`{$key}`="."'".addslashes($value)."'";
        }
        $where_condition=implode(",",$where_condition);
        return "UPDATE {$tablename} SET {$cols} WHERE {$where_condition};";
    } */

}
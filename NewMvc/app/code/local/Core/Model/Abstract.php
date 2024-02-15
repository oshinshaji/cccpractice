<?php
class Core_Model_Abstract{
    protected $_data=[];
    protected $resourceClass='';
    protected $collectionClass='';
    protected $resource=null;
    
    protected $collection=null;
    public function __construct(){
        $this->init();
    }

    public function init(){

    } 
    public function setResourceClass($resourceClass){

    }
    public function setCollectionClass($collectionClass){

    }

    public function setId($id){

    }

    public function getId(){
        return $this->_data[$this->getResource()->getPrimaryKey()];

    }
    public function getResource(){
        return new $this->resourceClass();

    }
    public function getCollection(){

    }

    
    public function __set($key,$value){

    }

    public function __get($key){

    }

    public function __unset($key){

    }

    public function __call($name, $arguments)
    {
        $name=$this->camel2dashed(substr($name,3));
        return (isset($this->_data[$name])
        ?$this->_data[$name]
        :" ");
        // echo $this->_data[$name];
    
    }

    function camel2dashed($className) {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
    }

    public function getData($key=null){

    }

    public function setData($data){

    }

    public function addData($key,$value){

    }

    public function removeData($key=null){

    }

    public function save(){

    }

    public function load($id,$column=null){
        // echo get_class($this->getResource());
        // echo $_tableName=;
         $this->_data=$this->getResource()->load($id,$column);
         return $this;
        // echo "SELECT * FROM {$this->getResource()->getTableName()} WHERE 'product_id'=1 LIMIT 1";
        // print_r($data);
    }

    public function delete(){

    }

     

}
?>
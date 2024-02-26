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
   protected function _beforeSave(){
        return $this;
    }
   protected function _afterSave(){
        return $this;
    }
    public function init(){ }

    public function setResourceClass($resourceClass){

    }
    public function setCollectionClass($collectionClass){

    }
    public function setId($id){
        $this->_data[$this->getResource()->getPrimaryKey()]=$id;
        return $this;


    }
    public function getId(){
       
        // echo $this->_data[$this->getResource()->getPrimaryKey()];
        return isset($this->_data[$this->getResource()->getPrimaryKey()])
        ?$this->_data[$this->getResource()->getPrimaryKey()]:false;

    }
    public function getResource(){
        return new $this->resourceClass();

    }
    public function getCollection(){
        $collection =new $this->collectionClass();
        $collection->setResource($this->getResource());
        $collection->select();
        return $collection;

    }
    public function __set($key,$value){

    }
    public function __get($key){

    }
    public function __unset($key){

    }

    public function __call($name,$arguments){
        $name=$this->camelToDashed(substr($name,3));
        return (isset($this->_data[$name])
        ?$this->_data[$name]
        :" ");
        

    }

    public function dashesToCamelCase($string, $capitalizeFirstCharacter = false) 
    {
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }
        return $str;
    }
 
    public function camelToDashed($className){
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_',$className));

    }

    public function getData($key=null){
        return $this->_data;

    }

    public function setData($data){
        $this->_data=$data;
        return $this;

    }

    public function addData($key,$value){
        

    }

    public function removeData($key=null){

    }

    public function save(){
        $this->_beforeSave();
    //    print_r( $this->getData());
       $this->getResource()->save($this);
       $this->_afterSave();

       return $this;
    //    print_r( $this);
    }

    public function load($id,$column=null){
        $this->_data=$this->getResource()->load($id,$column);
        return $this;
        

    }

    //delete 
    public function delete(){
        $this->getResource()->delete($this);
        return $this;
    }

    //update
    public function update($id){
        
    }


     

}
?>
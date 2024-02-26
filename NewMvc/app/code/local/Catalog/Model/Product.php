<?php 
class Catalog_Model_Product extends Core_Model_Abstract{

    public function init(){
        
        $this->resourceClass="Catalog_Model_Resource_Product";
        $this->collectionClass="Catalog_Model_Resource_Collection_Product";
    }

    public function getStatus() {
        $mapping = [1=>'Enabled',0=>'Disabled'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];

        }
    }

    public function getCategoryId() {
        $mapping = [1=>'Bar & Game Room',2=>'Bedroom',3=>'Decor',4=>'Dining & Kitchen',5=>'Lighting',6=>'Living Room',7=>'Mattresses',8=>'Office',9=>'Outdoor',];
        if(isset($this->_data['category_id'])){
            return $mapping[$this->_data['category_id']];

        }
    }

   /*  protected function _beforeSave(){
        if(!isset($this->_data['created_at']) || $this->_data['created_at']=""){

        }
        $this->_data['created_at']='2015-10-10';
        $this->_data['updated_at']='2015-10-10';

        }
 */
        protected function _beforeSave()
    {
        if(!isset($this->_data['created_at']) || $this->_data['created_at']== "")
        {
            $this->_data['created_at'] = '2015-01-01';
        }
        $this->_data['updated_at'] = date('Y-m-d H:i:s');
        return $this;
    }

}
?>
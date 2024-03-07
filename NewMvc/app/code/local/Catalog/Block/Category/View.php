<?php
class Catalog_Block_Category_View extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('catalog/category/view.phtml');
    }
    public function getCategoryId(){

        $data=Mage::getBlock('core/template');

        $id=$data->getRequest()->getParams('id');
        return $id;
    }
}
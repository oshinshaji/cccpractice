<?php
class Catalog_Controller_Category extends Core_Controller_Front_Action{
    public function viewAction(){
    
        /*$data=Mage::getBlock('core/template');
        $id=$data->getRequest()->getParams('id');
        print_r($id);
        $data1=Mage::getModel('catalog/product') ->getCollection()
        ->addFieldToFilter('category_id',$id)->getData();
        print_r($data1); */
        

        $layout=$this->getLayout();
        $child=$layout->getChild('content');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');


        $categoryView=$layout->createBlock('catalog/category_view');
        $child->addChild('categoryView',$categoryView);
        $layout->toHtml();
    }
}
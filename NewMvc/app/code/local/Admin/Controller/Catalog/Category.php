<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action{
    public function formAction(){
        echo "in category admin";
        $layout=$this->getLayout();
        $child=$layout->getChild('content');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $categoryForm=$this->getLayout()->createBlock('catalog/admin_category_form');
        $child->addChild('categoryForm',$categoryForm);
        $layout->toHtml();

    }

}
<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        // echo "here in index.php";
        // echo "in form action";
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');
        // $productForm= $layout->createBlock('catalog/admin_product')->setTemplate('product/form.phtml');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        //    print_r($layout->createBlock('catalog/admin_product_form'));
        $child->addChild('form', $productForm);
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/header.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/footer.css');

        // $child->getChild('form')->addJs(Mage::getBaseUrl() . 'skin/css/form.css');
        $layout->toHtml();

    }

    public function saveAction()
    {

        $data = $this->getRequest()->getParams('pdata');
        echo "<pre>";
        //  echo get_class($this);
        /*echo "in save action";
        print_r($data);
        echo "end"; */
        $productModel = Mage::getModel('catalog/product');
        // $productModel= new Catalog_Model_Product();
        $productModel->setData($data)->save();
        // print_r($productModel);
        // $productModel->save();
        // print_r($productModel);
    }

    //delete

    public function deleteAction()
    {
        // $id = $this->getRequest()->getParams('id',0);
        Mage::getModel('catalog/product')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();
        // $productModel->delete($id);
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        // echo "here in index.php";
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');
        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/header.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/footer.css');
        $layout->toHtml();

    }



}
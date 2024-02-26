<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action
{

    /* public function formAction()
    {
        $layout = $this->getLayout();
        // echo "here in index.php";
        echo "in form action";
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');
        // $productForm= $layout->createBlock('catalog/admin_product')->setTemplate('product/form.phtml');
        $productForm = $layout->createBlock('catalog/admin_product')->setTemplate('catalog/admin/product/form.phtml');

        $child->addChild('form', $productForm);

        $layout->toHtml();

    } */
    public function listAction()
    {
        $layout = $this->getLayout();
        // echo "here in index.php";
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');
        $productList = $layout->createBlock('catalog/admin_product_list')->setTemplate('product/list.phtml');
        $child->addChild('list', $productList);

        $layout->toHtml();

    }
    /* public function saveAction()
    {

        $data = $this->getRequest()->getParams('pdata');
        echo "<pre>";
        // print_r($data);
        $productModel = Mage::getModel('catalog/product');
        // $productModel= new Catalog_Model_Product();

        $productModel->setData($data);
        print_r($productModel);

        $productModel->save();
        // print_r($productModel);
        die();

    } */

}
<?php
class Page_Controller_Index extends Core_Controller_Front_Action{
    public function indexAction(){
        $layout= $this->getLayout();
        // // echo "here in index.php";
        // $layout->getChild('head')->addJs('js/head.js');
        // $layout->getChild('head')->addJs('js/page.js');
        // $layout->getChild('head')->addCss('css/page.css');
        // $layout->getChild('head')->addCss('css/head.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');

        $child=$layout->getChild('content');
        $banner= $layout->createBlock('banner/banner')->setTemplate('banner/banner.phtml');
        $child->addChild('banner',$banner); 

        /* $banner2= $layout->createBlock('core/template')->setTemplate('banner/banner.phtml');
        $child->addChild('bannner2',$banner2); */
        $layout->toHtml();
      
    }

    public function testAction()
    {
        echo "<pre>";
        // var_dump($_SESSION);
        // $productModel=Mage::getSingleton('core/session');
        // ->set('customer_id',1);
        // print_r($_SESSION);
        $productModel=Mage::getSingleton('catalog/product')->setData(['as','ab']);
         print_r($productModel);
        $productModel=Mage::getSingleton('catalog/product')->setData(['xyz','asdsxb']);
        print_r($productModel);



    }
}
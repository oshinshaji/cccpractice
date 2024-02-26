<?php
class Page_Controller_Index extends Core_Controller_Front_Action{
    public function indexAction(){
        $layout= $this->getLayout();
        // echo "here in index.php";
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child=$layout->getChild('content');
        $banner= $layout->createBlock('core/template')->setTemplate('banner/banner.phtml');
        $child->addChild('banner',$banner);

        /* $banner2= $layout->createBlock('core/template')->setTemplate('banner/banner.phtml');
        $child->addChild('bannner2',$banner2); */
        $layout->toHtml();
      
    }
}
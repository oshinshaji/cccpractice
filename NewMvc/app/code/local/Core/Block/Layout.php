<?php

class Core_Block_Layout extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('core/1column.phtml');
        $this->prepareChildren();
    }
    public function prepareChildren(){
        
       $header= $this->createBlock('page/header');
    //    print_r($header);
        $this->addChild('header',$header);

        $head= $this->createBlock('page/head');
    //    print_r($head);
        $this->addChild('head',$head);
        $content= $this->createBlock('page/content');
    //    print_r($header);
        $this->addChild('content',$content);
        $footer= $this->createBlock('page/footer');
    //    print_r($header);
        $this->addChild('footer',$footer);

    }
    public function createBlock($className){
        return Mage::getBlock($className);
        // ->setLayout($this);

    }
    
}
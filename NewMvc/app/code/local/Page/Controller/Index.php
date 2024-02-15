<?php
class Page_Controller_Index extends Core_Controller_Front_Action{
    public function indexAction(){
        $layout= $this->getLayout();
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $layout->toHtml();
        // print_r($layout);


        // ->toHtml();
        // print_r($layout);
        // die;
        // echo '<input type="text" name= "text" value="random">';
        // $layout= $this->getLayout();
        // echo dirname(__FILE__);
    }

   /*  public function testAction(){
        echo "1234";
        // $layout= $this->getLayout();
        // echo dirname(__FILE__);
    }

    public function saveAction(){
        echo "save data";
    } */
}  
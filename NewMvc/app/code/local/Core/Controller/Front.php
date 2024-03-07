<?php

class Core_Controller_Front{
    public function init(){
        // $request=new Core_Model_Request();
        $request=Mage::getModel("core/request");
        // echo get_class($request);die;
        // print_r($request->getActionName());
        $actionName= $request->getActionName(). 'Action';
        $fullClassName=$request->getFullControllerClass();
        // $indexAction=new $fullClassName();
        // $action=$actionName . 'Action';
        $controller=new $fullClassName();
        $controller->$actionName();
      
    }
}
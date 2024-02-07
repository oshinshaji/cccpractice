<?php
class Mage{
    public static function init(){
        /* $request=new Core_Model_Request();
        echo  $request->getRequestUri(); */
        $requestModel=Mage::getModel("core/request");
       echo get_class($requestModel);
    }

    public static function getModel($modelName){
        $modelName=explode("/",$modelName);
        $modelName[0]=ucfirst($modelName[0]);
       $modelName[0].="_Model_";
       $modelName[0].=ucfirst($modelName[1] );
    //    $modelName[0];
        return new $modelName[0];
    }

}
?>
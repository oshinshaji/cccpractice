<?php
class Mage{
    public static $baseDir='C:\xampp\htdocs\Cybercom_Practice\NewMvc';
    public static function init(){

        /* $request=new Core_Model_Request();
        echo  $request->getRequestUri(); */
        // $requestModel=Mage::getModel("core/request");
    //    echo get_class($requestModel);
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }

   

    public static function getModel($modelName)
    {
        $name=explode("/",$modelName);
        $classname=ucfirst(($name[0]))."_"."Model"."_".ucfirst(($name[1]));
        return new $classname();
        
    }
    public static function getBlock($blockName)
    {
        $name=explode("/",$blockName);
        $classname=ucfirst(($name[0]))."_"."Block"."_".ucfirst(($name[1]));
        return new $classname();
        
    }

    public static function getSingleton($className){

    }
   

    public static function register($key, $value){

    }

    public static function registry($key){

    }

    public static function getBaseDir($subDir = null){
        
        if($subDir)
        {
            return self::$baseDir."/".$subDir;
        }
        return self::$baseDir;

    }


}
?>
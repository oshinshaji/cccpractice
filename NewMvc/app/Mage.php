<?php
class Mage
{
    
    public static $baseDir= 'C:\xampp\htdocs\cybercom_practice\newMvc';

    private static $singleton=[];
    public static function init()
    {
        $frontcontroller=new Core_Controller_Front();
         $frontcontroller->init();
        //$requestModel=new Core_Model_Request();
        //echo $requestModel->getRequestUri();
        //$requestModel=Mage::getModel("core/request");
        //echo (get_class($requestModel));
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

    public static function getSingleton($className)
    {
        // $model=explode("/",$className);
        // $modelObj=ucfirst($model[0])."_Model_".ucfirst($model[1]);
        if(isset(self::$singleton[$className])) {
            // echo "exists";
           return  self::$singleton[$className];
        }
        else{
            return self::$singleton[$className]=self::getModel($className);
        }

       

    }

    public static function register($key, $value)
    {

    }

    public static function registry($key)
    {

    }

    public static function getBaseDir($subDir = null)
    {
        if($subDir)
        {
            return self::$baseDir."/".$subDir;
        }
        return self::$baseDir;
    }
    public static function getBaseUrl(){
        return "http://localhost/cybercom_practice/newMvc/";
    }
}
?>
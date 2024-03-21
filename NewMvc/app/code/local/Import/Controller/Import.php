<?php
class Import_Controller_Import extends Core_Controller_Front_Action{
    public function importAction(){
        // echo "<pre>";
        // echo "in import action";
        $path=Mage::getBaseUrl() . 'media/import/Book1.csv' ;
        $row=1;
        $header=[];
        $array=[];
        if (($open = fopen($path, "r")) !== false) {
            while (($data = fgetcsv($open, 1000, ",")) !== false) {
                if($row==1){
                    $header=$data;
                    $row++;
                    continue;
                }
               $array= array_combine($header,$data);
               $importData=json_encode($array);
               Mage::getModel('import/import')->addData('data',$importData)->save();
               print_r($data);
            }
         
            fclose($open);
        }
         
    }
}
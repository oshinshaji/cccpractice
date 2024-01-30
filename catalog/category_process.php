<?php
//oshin
include_once "sql/connection.php";
include_once "sql/class.php";

$fb3=new func_building();
$fe3=new func_executer();

if(isset($_POST['add_category'])){
    $c_data=$_POST['c_data'];
    $col_name=$c_data['name'];
    $sql=$fb3->insert('ccc_category',$c_data);
    $fe3->query_executer($sql,$conn);
    
}
else{
  echo "Error";
}


//oshin
?>
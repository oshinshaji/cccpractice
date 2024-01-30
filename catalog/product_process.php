<?php
//oshin
include_once "sql/connection.php";
include_once "sql/class.php";

$fb1=new func_building();
$fe1=new func_executer();

if(isset($_POST['insert'])){
    $p_data=$_POST['p_data'];
    $sql=$fb1->insert('ccc_product',$p_data);
    $fe1->query_executer($sql,$conn);
     
}

else if(isset($_POST['update'])){
  $p_data=$_POST['p_data'];
  $product_name = $p_data['product_name'];
  $sql=$fb1->update('ccc_product',$p_data,['product_name'=>$product_name]);
  $fe1->query_executer($sql,$conn);
}

else if(isset($_POST['delete'])){
  $p_data=$_POST['p_data'];
  $product_name = $p_data['product_name'];
  $sql=$fb1->delete('ccc_product',['product_name'=>$product_name]);
  $fe1->query_executer($sql,$conn);
  
}
else{
  echo "Error";
}

//oshin
?>
<?php
//oshin
include_once "form_connection.php";
include_once "form_functions.php";
if(isset($_POST['submit'])){
    $p_data=$_POST['p_data'];
    
}

$sql=insert('ccc_product',$p_data);
// $sql=update('ccc_product',$p_data,['product_name'=>'abc']);
// $sql=delete('tableee',['product_name'=>'abc']);
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record added')</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//oshin
?>
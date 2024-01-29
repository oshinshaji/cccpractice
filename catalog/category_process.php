<?php
//oshin
include_once "sql/connection.php";
include_once "sql/functions.php";


if(isset($_POST['submit'])){
    $c_data=$_POST['c_data'];
    
}

$sql=insert('ccc_category',$c_data);
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New category added')</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//oshin
?>
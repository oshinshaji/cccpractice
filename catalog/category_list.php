<?php
include_once "sql/connection.php";
include_once "sql/functions.php";
$maxInt = PHP_INT_MAX;
$countQuery = "SELECT COUNT(*) AS total_rows FROM ccc_product";
$countResult = $conn->query($countQuery);
$countRow = $countResult->fetch_assoc();
$totalRows = $countRow['total_rows'];
$n=$totalRows;
$limit=$totalRows-$n;
$c_data=array("name");
if(isset($_POST['submit'])){
    $c_data=$_POST['c_data'];
    $col_name=$c_data['name'];
    
}
$sql=select('ccc_category',$c_data,$n,$limit,$col_name);
$result=$conn->query($sql);

if($result->num_rows>0){
    while($record=$result->fetch_assoc()){
        echo  "$record[name]"."<br>";
    }
}
?>
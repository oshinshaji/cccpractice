<?php

include_once "sql/connection.php";
include_once "sql/class.php";
include_once "sql/object_for_data.php";
include_once "product_process.php";

$fb2=new func_building();
$fe2=new func_executer();
$newObj = new Data_Collection_Object();
// $column_names=array("product_id","product_name","sku","category");
$column_names=array('*');
$extra=["where"=>[],"order_by"=>["product_id DESC"],"limit"=>10];
$sql=$fb2->select('ccc_product',$column_names,$extra);
// echo $sql;
// echo $sql;
$result =$fe2->query_executer($sql,$conn);
$_temp=$fe2->fetch_association($result);


foreach ($_temp as $temp) {
    $newObj->addData($temp);
}

echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Product Name</th>
<th>SKU</th>
<th>Product Type</th>
<th>Category</th>
<th>Manufacturer Cost</th>
<th>Shipping Cost</th>
<th>Total Cost</th>
<th>Price</th>
<th>Status</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>";
foreach($newObj->getData() as $_mmdata){
  echo "<tr>";
  echo "<td>".$_mmdata->getProduct_id('0')."</td>";
  echo "<td>".$_mmdata->getProduct_name('0')."</td>";
  echo "<td>".$_mmdata->getSku('0')."</td>";
  echo "<td>".$_mmdata->getProduct_type('0')."</td>";
  echo "<td>".$_mmdata->getCategory()."</td>";
  echo "<td>".$_mmdata->getManufacturer_Cost()."</td>";
  echo "<td>".$_mmdata->getShipping_Cost()."</td>";
  echo "<td>".$_mmdata->getTotal_Cost()."</td>";
  echo "<td>".$_mmdata->getPrice()."</td>";
  echo "<td>".$_mmdata->getStatus()."</td>";
  echo "<th> <a href='product.php?product_id=".$_mmdata->getProduct_Id('0')."'>Edit</a></th>";
  echo "<th> <a href='product_list.php?delete=".$_mmdata->getProduct_Id('0')."'>Delete</a></th>";
  echo "</tr>";
  
}
echo "</table>";

$conn->close();

?>

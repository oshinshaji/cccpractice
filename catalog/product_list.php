<?php
//oshin
include_once "sql/connection.php";
include_once "sql/class.php";

$fb2=new func_building();
$fe2=new func_executer();

$zdata=array("product_id","product_name","sku","category");
$extra="<th><a href='product.php/'>Edit</a></th>"."<th><a href='product.php/'>Delete</a></th>";

// $sql =$fb2-> select('ccc_product',$zdata,$n,$limit,$col_name);

$sql =$fb2-> select('ccc_product',$zdata);

$result = $fe2->query_executer($sql,$conn);
echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Product Name</th>
<th>SKU</th>
<th>Category</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>";
if ($result->num_rows > 0) {
   $fe2->fetch_association($result,$zdata,$extra);
  
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
//oshin
?>

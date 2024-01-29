<?php
//oshin
include_once "sql/connection.php";
include_once "sql/functions.php";
$zdata=array("product_id","product_name","sku","category");
// $sql = select('ccc_product',$zdata);
$maxInt = PHP_INT_MAX;
$countQuery = "SELECT COUNT(*) AS total_rows FROM ccc_product";
$countResult = $conn->query($countQuery);
$countRow = $countResult->fetch_assoc();
$totalRows = $countRow['total_rows'];
$n=20;
$limit=$totalRows-$n;
// $col_name=$c_data['product_id'];

$sql = select('ccc_product',$zdata,$n,$limit,$col_name);

$result = $conn->query($sql);
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
    while($row = $result->fetch_assoc()){
  echo "<tr>";
  echo "<td>" . $row['product_id'] . "</td>";
  echo "<td>" . $row['product_name'] . "</td>";
  echo "<td>" . $row['sku'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<th><a href='product.php/'>Edit</a></th>";
echo "<th><a href='product.php/'>Delete</a></th>";
  echo "</tr>";
  }
  
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
//oshin
?>

<?php
//oshin
include_once "form_connection.php";
// $sql="SELECT * FROM ccc_product order by sku ASC limit 10 EXCEPT TOP 2;";
$maxInt = PHP_INT_MAX;
$countQuery = "SELECT COUNT(*) AS total_rows FROM ccc_product";
$countResult = $conn->query($countQuery);
$countRow = $countResult->fetch_assoc();
$totalRows = $countRow['total_rows'];
$n=10;
$limit=$totalRows-$n;

$sql = "SELECT * FROM ccc_product
ORDER BY product_id
LIMIT 2 , 10";

$result = $conn->query($sql);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo 
    "<ul>
      <li>$row[product_name]
      $row[sku].
      $row[product_type].
      $row[category].
      $row[manufacturer_cost].
      $row[shipping_cost].
      $row[total_cost].
      $row[price].
      $row[status].
      $row[created_at].
      $row[updated_at].</li>
      
    </ul>";
    /* "product: " . $row["product_name"]."&nbsp"."&nbsp"."&nbsp". 
    "sku: " . $row["sku"].
    ": " . $row[""].
"ategory: "  $ro["category"].
    "anufacture_cost: ". $row["manufacturer_cost"].
    "hipping_cst: ". $row["shipping_cost"].
    "otal_cos: ". $row["total_cost"].
    "rice:  $row["price"].
    "tatus:".$row["status"].
    "reate_at:  .$row["created_at"].
    "pdatd_at:  . row["updated_at"]."<br>"; */
  }
} else {
  echo "0 results";
}
$conn->close();
//oshin
?>

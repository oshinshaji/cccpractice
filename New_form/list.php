<?php
include_once "form_connection.php";
$sql="SELECT * FROM ccc_product;";
// SELECT * FROM table_name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "product: " . $row["product_name"]."&nbsp"."&nbsp"."&nbsp". 
    "sku: " . $row["sku"].
    "product_type: " . $row["product_type"].
    "category: " . $row["category"].
    "manufacturer_cost: " . $row["manufacturer_cost"].
    "shipping_cost: " . $row["shipping_cost"].
    "total_cost: " . $row["total_cost"].
    "price: " . $row["price"].
    "status: " . $row["status"].
    "created_at: " . $row["created_at"].
    "updated_at: " . $row["updated_at"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
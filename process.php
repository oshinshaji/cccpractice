<?php
$server_name="localhost";
$username="root";
$password="";
$database="ccc_practice";
$conn=mysqli_connect($server_name,$username,$password,$database);
if(!$conn){
    die("Error".mysqli_connect_error($conn));
}
if(isset($_POST['submit']))
{
    $product_name=$_POST['pname'];
    $sku=$_POST['sku'];
    $product_type=$_POST['product_type'];
    $category=$_POST['category'];
    $manufacturer_cost	=$_POST['mcost'];
    $shipping_cost=$_POST['scost'];
    $total_cost=$_POST['tcost'];
    $price=$_POST['price'];
    $status=$_POST['status'];
    $created_at=$_POST['created_at'];
    $updated_at=$_POST['updated_at'];
    /* $sql="insert into ccc_product(product_name,sku,product_type,category,manufacturer_cost,shipping_cost,total_cost,price,
    status,created_at,updated_at) values( $product_name,$sku,$product_type,$category,
    $manufacturer_cost,$shipping_cost,$total_cost,$price,$status,$created_at,$updated_at)";
    
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('new record added')</script>";

    }
    else{
        echo "error:".mysqli_error($conn);
    } */

     // Use parameterized query to prevent SQL injection
     $sql = "INSERT INTO ccc_product (product_name, sku, product_type, category, manufacturer_cost, shipping_cost, total_cost, price, status, created_at, updated_at)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssssssssss", $product_name, $sku, $product_type, $category, $manufacturer_cost, $shipping_cost, $total_cost, $price, $status, $created_at, $updated_at);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('New record added')</script>";
        } else {
        echo "Error: " . mysqli_error($conn);
        }
    mysqli_close($conn);
}
?>
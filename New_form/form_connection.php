<?php
$server_name="localhost";
$username="root";
$password="";
$database="ccc_practice";
$conn=mysqli_connect($server_name,$username,$password,$database);
if(!$conn){
    die("Error".mysqli_connect_error($conn));
}

?>
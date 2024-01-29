<?php
//oshin
include_once "sql/connection.php";
include_once "sql/functions.php";

if(isset($_POST['insert'])){
    $p_data=$_POST['p_data'];
    $sql=insert('ccc_product',$p_data);
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('New record added')</script>";
      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }   
}
else if(isset($_POST['update'])){
  $p_data=$_POST['p_data'];
  $product_name = $p_data['product_name'];
  $sql=update('ccc_product',$p_data,['product_name'=>$product_name]);
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record updated')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{
  echo "Errorrrr";
}

/* function sql_iquery($tablename,$data){
  $sql=insert($tablename,$data);
  echo "herer";
  return $sql;
} */

/* function sql_uquery($tablename,$data){
  $sql=update($tablename,$data,['product_name'=>'Pencil']);
  return $sql;
} */

// $sql=insert('ccc_product',$p_data);
// $sql=update('ccc_product',$p_data,['product_name'=>'abc']);
// $sql=update('ccc_product',$p_data,['product_name'=>'abc']);
// $sql=delete('tableee',['product_name'=>'abc']);
/* if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record added')</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 */
//oshin
?>
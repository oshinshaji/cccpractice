<?php

include_once "sql/connection.php";
include_once "sql/class.php";
include_once "sql/object_for_data.php";


$fb1 = new func_building();
$fe1 = new func_executer();
$newObj = new Data_Collection_Object();
$id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
$column_name = 'product_id';
$extra = ['where' => [$column_name => $id],];
$data = array('*');
$sql = $fb1->select('ccc_product', $data, $extra);
$result = $fe1->query_executer($sql, $conn);

if (isset($_GET['delete'])) {
  $delete = $_GET['delete'];
  $sql = $fb1->delete('ccc_product', ['product_id' => $delete]);
  $fe1->query_executer($sql, $conn);
}

if (isset($_POST['insert'])) {
  $p_data = $_POST['p_data'];
  if ($result->num_rows > 0 && isset($_GET['product_id']) && empty($_GET['product_id']) == false) {
    // $product_id = $_GET['product_id'];
    // $sql = $fb1->update('ccc_product', $p_data, ['product_id' => $product_id]);
    $sql = $fb1->update('ccc_product', $p_data, ['product_id' => $id]);
    $rr=$fe1->query_executer($sql, $conn);
    header("Location:product_list.php");
  } else {
    $sql = $fb1->insert('ccc_product', $p_data);
    // echo $sql;
    $fe1->query_executer($sql, $conn);
  }
}

?>

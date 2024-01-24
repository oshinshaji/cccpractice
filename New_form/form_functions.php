<?php
function insert($tablename,$data){
    $columns=[];
    $values=[];
    foreach($data as $field =>$value){
        $columns[]="`{$field}`";
        $values[]="'" .addslashes($value)."' ";
    }
    $columns=implode(",",$columns);
    $values=implode(",",$values);
    return "INSERT INTO {$tablename} ({$columns}) VALUES ({$values});";
} 

function update($tablename,$data,$where){

   $columns=[];
   $where_cond=[];
   foreach($data as $field => $value){
    $columns[]="`{$field}` =" ."'".addslashes($value)."'";
   }
   $columns=implode(",",$columns);
   foreach($where as $field => $value){
    $where_cond[]="`{$field}` =" ."'".addslashes($value)."'";
   }
   $where_cond=implode($where_cond);
   return "UPDATE {$tablename} SET {$columns} WHERE {$where_cond};";
} 

function delete($tablename,$where){
    $where_cond=[];
    foreach($where as $field => $value){
     $where_cond[]="`{$field}` =" ."'".addslashes($value)."'";
    }
    $where_cond=implode($where_cond);
    return "DELETE FROM {$tablename} WHERE {$where_cond};";
 } 
?>

<!-- UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition; -->
<!-- DELETE FROM Customers; -->
<!-- DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste'; -->
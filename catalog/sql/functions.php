<?php
// oshin
/* function insert($tablename,$data){
    $cols=[];
    $vals=[];
    foreach($data as $key =>$value){
        $cols[]="`{$key}`";
        $vals[]="'".addslashes($value)."'";
    }
    $cols=implode(",",$cols);
    $vals=implode(",",$vals);
    return "INSERT INTO $tablename ({$cols}) VALUES ({$vals});";

} */
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
    $cols=[];
    $where_condition=[];
    foreach($data as $key=>$value){
        $cols[]="`{$key}` ="."'".addslashes($value)."'";
    }
    $cols=implode(",",$cols);
    foreach($where as $key=>$value){
        $where_condition[]="`{$key}`="."'".addslashes($value)."'";
    }
    $where_condition=implode(",",$where_condition);
    return "UPDATE {$tablename} SET {$cols} WHERE {$where_condition};";
}

//changing here
/* function update($tablename,$data,$where,$name){
    $cols=[];
    $where_condition=[];
    foreach($data as $key=>$value){
        $cols[]="`{$key}` ="."'".addslashes($value)."'";
    }
    $cols=implode(",",$cols);
    foreach($where as $key=>$value){
        $where_condition[]="`{$key}`="."'".addslashes($value)."'";
    }
    $where_condition=implode(",",$where_condition);
    return "UPDATE {$tablename} SET {$cols} WHERE {$where_condition};";
} */

// DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';
function delete($tablename,$where){
    
    $where_condition=[];
    foreach($where as $key =>$value){
        $where_condition[]="`{$key}` ="."'".addslashes($value)."'";
    }
    $where_condition=implode($where_condition);
    return "DELETE FROM {$tablename} WHERE {$where_condition};";
}




// $sql = "SELECT * FROM ccc_product ORDER BY product_id LIMIT 2 , 10";

// "SELECT id, firstname, lastname FROM MyGuests"
/*  function select($tablename,$data){
    $cols=[];
    foreach($data as $key => $value){
        $cols[]="{$value}";
    }
    $cols=implode(",",$cols);
    return "SELECT {$cols} FROM {$tablename};";
} */
/* $maxInt = PHP_INT_MAX;
$countQuery = "SELECT COUNT(*) AS total_rows FROM ccc_product";
$countResult = $conn->query($countQuery);
$countRow = $countResult->fetch_assoc();
$totalRows = $countRow['total_rows'];
$n=20;
$limit=$totalRows-$n; */

function select($tablename,$data,$n,$limit,$col_name){
    $cols=[];
    foreach($data as $key => $value){
        $cols[]="{$value}";
    }
    $cols=implode(",",$cols);
    $orderByClause = ($col_name) ? "ORDER BY {$col_name}" : "";
    return "SELECT {$cols} FROM {$tablename} {$orderByClause} {$col_name}
LIMIT $limit , $n;";
}

// "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// UPDATE Customers
// SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
// WHERE CustomerID = 1;

// DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';

// $sql = "SELECT id, firstname, lastname FROM MyGuests";

// oshin
?>
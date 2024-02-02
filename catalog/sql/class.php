<?php

include_once "connection.php";

/*-----------------Function builder class------------------ */
class func_building{

    /*-----------------Insert Function------------------ */
public function insert($tablename,$data){
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

    /*-----------------Update Function------------------ */
public function update($tablename,$data,$where){
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
    
    /*-----------------Delete Function------------------ */
public function delete($tablename,$where){
    
        $where_condition=[];
        foreach($where as $key =>$value){
            $where_condition[]="`{$key}` ="."'".addslashes($value)."'";
        }
        $where_condition=implode($where_condition);
        return "DELETE FROM {$tablename} WHERE {$where_condition};";
    }


    /*-----------------Select Function------------------ */
/* public function select($tablename,$data){
        $cols=[];
        foreach($data as $key => $value){
            $cols[]="{$value}";
        }
        $cols=implode(",",$cols);
        return "SELECT {$cols} FROM {$tablename};";
    } */
    public function select($tablename, $data, $extra)
    {
        $cols = [];
        foreach ($data as $key => $value) {
            $cols[] = "{$value}";
        }
        $cols = implode(",", $cols);
        $sql = "SELECT {$cols} FROM {$tablename}";

        if (!empty($extra['where'])) {
            $where = [];
            foreach ($extra['where'] as $key => $value) {
                $where[] = "$key=$value";
            }
            $where = implode("", $where);
            $sql .= " WHERE {$where}";
        }
        if (!empty($extra['order_by'])) {

            $order_by = implode(", ", $extra["order_by"]);
            $sql .= " ORDER BY {$order_by}";
        }
        if (!empty($extra['limit'])) {
            $sql .= " LIMIT {$extra['limit']}";
        }

        return $sql;
    }

}

/*-----------------Function Executer class------------------ */
class func_executer{

    /*-----------------Query executer Function------------------ */
    public function query_executer($sql,$conn){
        $result = $conn->query($sql);
        $obj5=new printer();
        $obj5->message();
        return $result;
    }

    /*-----------------Fetch Association Function------------------ */
   
    public function fetch_association($result){
        $data=[];
        // if ($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $data[]=$row;
            // }

        }
        return $data;
        
    }
    
}

/*-----------------Message Printer Class------------------ */
class printer{

    /*-----------------Message Function------------------ */
    public function message(){
        if(isset($_POST['insert'])){
            echo "<script>alert('New record added')</script>";
        }
        else if(isset($_POST['update'])){
            echo "<script>alert('Record updated')</script>";
        }
        else if(isset($_POST['delete'])){
            echo "<script>alert('Record deleted')</script>";
        }
      else if(isset($_POST['add_category'])){
        echo "<script>alert('Category added')</script>";
       
      }
      else{
        // echo "RECORDS"."<br>";
      }
    }

}

?>
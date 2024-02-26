<?php
class Core_Model_DB_Adapter
{

    public $config = [
        "host" => "localhost",
        "username" => "root",
        "password" => "",
        "db" => "new_ccc_db",
    ];
    public $connect = null;

    public function connect()
    {
        if ($this->connect == null) {
            $this->connect = mysqli_connect(
                $this->config["host"],
                $this->config["username"],
                $this->config["password"],
                $this->config["db"]
            );
        }
        return $this->connect;
    }

    public function fetchAll($query)
    {
        $row = [];
        $sql = mysqli_query($this->connect(),$query);
        while($_row = mysqli_fetch_assoc($sql))
        {
            $row[] =$_row;
        }
        return $row;
    }

    public function fetchPairs($query)
    {

    }

    public function fetchOne($query)
    {

    }

    public function fetchRow($query)
    {
        // echo "here";
        $row = [];
        $sql = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($sql)) {
            $row = $_row;
        }
        return $row;

    }
    public function insert($query)
    {
        /* if(mysqli_query($this->connect(),$query)){
            return mysqli_insert_id($this->connect());
        }
        else{
            return false;
        } */
        // $result = mysqli_query($this->connect(),$query);;

        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return mysqli_insert_id($this->connect());

        } else {
            return FALSE;
        }

    }
    
    //delete
    public function delete($query)
    {
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return TRUE;

        } else {
            return FALSE;
        }


    }

    //update
    public function update($query)
    {
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return TRUE;

        } else {
            return FALSE;
        }

    }

    public function query($query)
    {

    }



}


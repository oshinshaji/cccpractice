<?php
class Core_Model_DB_Adapter{

    public $config = [
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "db" => "ccc_practice"
    ];

    public $connect = null;

    public function connect() {
        if ($this->connect == null) {
            $this->connect = mysqli_connect(
                $this->config["host"],
                $this->config["user"],
                $this->config["password"],
                $this->config["db"]
            );
        }
        return $this->connect;
    }

    public function fetchAll($query){

    }

    public function fetchPairs($query){

    }

    public function fetchOne($query){

    }

    public function fetchRow($query){
        $row=[];
        $sql=mysqli_query($this->connect(),$query);
        // print_r($result);
        while($_row=mysqli_fetch_assoc($sql)){
            $row=$_row;
        }
        return $row;


    }
    public function insert($query){

    }
    public function update($query){

    }
    public function delete($query){

     }

    public function query($query){ 
        
     }



}


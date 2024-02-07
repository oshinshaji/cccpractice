<?php

class Student{
    public $name;
    public $enr_no;
    public $age;
    public $surname;

    public function display_data(){
        echo $this->name."<br>".$this->enr_no."<br>".$this->age."<br>".$this->surname."<br>";

    }
}

?>
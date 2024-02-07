<?php
class Employee{
    public $e_name;
    public $e_age;
    public $e_salary;

    public function calc_yealry_bonus(){
        echo "Yearly Bonus:".$this->e_salary* 0.2;
    }
}
?>
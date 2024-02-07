<?php
echo "classsssss"."<br>";
class abc {
   public $a=10;
   private $b="Hello";
   protected $c="World";
   function __construct(){

   }

    }

class xyz extends abc{
    // public $a=20;

}
class pqr extends xyz{
    // public $a=30;
}
$obj1= new abc();
$obj2=new xyz();
$obj3=new pqr();

// print_r($obj1->c);
echo "<br>";
// print_r($obj2->c);
echo "<br>";
// print_r($obj3->b);
echo "<br>";


?>
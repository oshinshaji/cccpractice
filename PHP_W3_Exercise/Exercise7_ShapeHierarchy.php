<?php
class Shape{
    public $length;
    public $breadth;
}

class Circle extends Shape{
    public $radius;
    public function calc_area(){
        echo "Area of Circle:".pow($this->radius,2)*pi();
        echo "<br>";
    }
    public function calc_perimeter(){
        echo "Perimeter of Circle:". 2*($this->radius)*pi();
        echo "<br>";
    }
}

class Rectangle extends Shape{
    public $length;
    public $breadth;
    public function calc_area(){
        echo "Area of Rectangle:".($this->length)*($this->breadth);
        echo "<br>";
    }

    
    public function calc_perimeter(){
        echo "Perimeter of Rectangle:". 2*($this->length) + 2*($this->breadth);
        echo "<br>";
        
    }

    
}

class Square extends Shape{
    public $length;

    public function calc_area(){
        echo "Area of Square:".pow($this->length,2);
        echo "<br>";
        
    }

    
    public function calc_perimeter(){
        echo "Perimeter of Circle:". 4*($this->length);
        echo "<br>";
        
    }

    
}
?>
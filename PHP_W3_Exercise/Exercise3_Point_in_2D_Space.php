<?php
class TwoD_Space{
    public $x;
    public $y;

    public function Calc_Distance(TwoD_Space $other_point){
        echo sqrt(pow($this->x - $other_point->x,2)+pow($this->x - $other_point->x,2));
        
    }
    
}
?>
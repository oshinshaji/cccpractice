<?php

class Calculator{
    function add($x,$y){
        $z=$x+$y;
        return $z;
    }

    function sub($x,$y){
        $z=$x-$y;
        return $z;

    }

    function mul($x,$y){
        $z=$x*$y;
        return $z;

    }

    function div($x,$y){
        if($y==0){
            echo "Cannot divide by 0";
        }
        $z=$x/$y;
        return $z;

    }


}


?>
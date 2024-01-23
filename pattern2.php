<?php
echo "<br>";
$a=10;
for($i=1; $i<= $a; $i++){
    for($j=1; $j<=$a; $j++){
        if($j<=($a+1)-$i){
            echo("$j");
        }
    }
    echo "<br>";
}
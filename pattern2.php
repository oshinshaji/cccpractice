<?php
echo "<br>";
$n=10;
for($i=1; $i<= $n; $i++){
    for($j=1; $j<=$n; $j++){
        if($j<=($n+1)-$i){
            echo $j." ";
        }
    }
    echo "<br>";
}
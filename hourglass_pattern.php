<?php
echo "Hourglass Even"."<br>";
$n=10;

for($i=1;$i<=$n/2;$i++){
    for($j=1;$j<=$n;$j++){
        if($j<$i || $j>$n-$i+1){
            echo "-"." ";
        }
        else{
            echo $j." ";
        }
    }
    echo "<br>";
}

/* for($i=$n/2;$i>0;$i--){

} */
for($i=($n/2)-2;$i>=0;$i--){
    for($j=1;$j<=$n;$j++){
        if($j>$i && $j<$n-$i+1){
            echo $j." ";
        }
        else{
            echo "-"." ";
        }
    }
    echo "<br>";
}

echo "<br>";
echo "<br>";
echo "<br>";

echo "Hourglass Odd"."<br>";
$n=11;

for($i=0;$i<$n/2;$i++){
    for($j=1;$j<=$n;$j++){
        if($j<=$i || $j>$n-$i){
            echo "-"." ";
        }
        else{
            echo $j." ";
        }
    }
    echo "<br>";
}
for($i=1;$i<=$n/2;$i++){
    for($j=1;$j<=$n;$j++){
        if($j<=($n/2)-$i || $j>($n/2)+$i){
            echo "-"." ";
        }
        else{
            echo $j." ";
        
        }
    }
    echo "<br>";
}
?>
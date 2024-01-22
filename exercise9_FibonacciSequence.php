<?php
$num=20;
function fibonacci_seq($n){
$x=0;
$y=1;
if($n==1){
    echo $x;
}
else if($n==2){
    echo $x." ".$y." ";
}
else{
    echo $x." ".$y." ";
    for($i=2;$i<$n;$i++){
    $z=$x +$y;
    echo $z." ";
    $x=$y;
    $y=$z;
}
}
}
fibonacci_seq($num);

?>
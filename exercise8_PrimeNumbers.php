<?php
$n=20;
$x=0;
if($n==0 || $n==1){
    echo "Neither Prime nor composite";
}
for($i=2;$i<=$n;$i++){
   
    if($n%$i == 0){
        // echo "here"."<br>";
        $x++;
    }
    
}
// echo $x;
if($x == 1){
    echo "Prime";
}
else{
    echo "Not Prime";
}
?>
<?php
$num=5;
$f=1;
/*
//Normal 
for($i=$n;$i>0;$i--){
    $factorial=$factorial * $i;
}
echo $factorial; */

//Recursive
function factorial($n){
    $f=1;
    if($n==0 ||$n==1){
        return 1;
    }
    else{
        return $n *factorial($n-1);
    }
}

echo factorial($num);



?>
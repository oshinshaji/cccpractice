<?php
//         0, 1, 2, 3, 4, 5, 6
$arr=array(64,34,25,12,22,11,90);
// $len=count($a);
/* function swap($a,$b){
    $temp=$a;
    $a=$b;
    $b=$temp;
    echo "here";
} */
function bubble_sort($a){
    $len=count($a);
    for ($j=$len-1;$j>0;$j--){
        for($i=1;$i<=$j;$i++){
            if($a[$i-1]>$a[$i]){
            $temp=$a[$i];
            $a[$i]=$a[$i-1];
            $a[$i-1]=$temp;
            }
            else{
                continue;
            }
        }
    }
     
    print_r($a); 
};

bubble_sort($arr);


?>
<?php

$high_percent="10";
$low_percent= (100 * $high_percent)/(100 + $high_percent);
echo "LOW PERCENT VALUE IS:".$low_percent."<br>";
echo "Approximately:".number_format($low_percent, 2, '.', '');

/* Explaination */
/* suppose a and b are the given number 
a is x% larger than b, while b is y% smaller than a
so,
a=b + ((xb)/100)  and b = a - ((ya)/100) 
solving both equations,
x = y + (xy/100)
therefore ,
y = 100x/(100+x), where x is the $high_percent
*/
?>

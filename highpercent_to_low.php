<?php

$high_percent="10";
$low_percent= (100 * $high_percent)/(100 + $high_percent);
echo "LOW PERCENT VALUE IS:".$low_percent."<br>";
echo "Approximately:".number_format($low_percent, 2, '.', '');
?>
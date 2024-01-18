<?php
echo "Exercise 4";
echo "<br>";

$name = "John";
echo str_pad($name,10,'_',STR_PAD_LEFT);
echo "<br>";

echo str_pad($name,8,'*',STR_PAD_RIGHT);

?>
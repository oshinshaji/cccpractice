<?php
echo "Basic Arithmetic"."<br>";
// // 1.abs($number)
// Returns the absolute value of a number.
$number=-55;
echo var_dump($number)."<br>";
$a=abs($number);
echo var_dump($a)."<br>";

// 2.ceil($number): 
// Rounds a number up to the nearest integer.
$number=44.8;
echo var_dump($number)."<br>";
$a=ceil($number);
echo var_dump($a)."<br>";

// 3.floor($number): 
// Rounds a number down to the nearest integer.
$number=48.8;
echo var_dump($number)."<br>";
$a=floor($number);
echo var_dump($a)."<br>";

// 4.round($number, $precision): 
// Rounds a number to the nearest integer or specified number of decimal places.
$number=45.6;
echo var_dump($number)."<br>";
$a=round($number);
echo var_dump($a)."<br>";
echo "<br>";

echo "Power Functions" ."<br>";
// 1.pow($base, $exponent): 
// Returns the value of a base raised to the power of an exponent.
$base=2;
$exponent=16;
echo pow($base,$exponent)."<br>";

// 2.sqrt($number)`: 
// Returns the square root of a number.
$number=16;
echo sqrt($number)."<br>";
echo "<br>";

echo "Random Number Generation"."<br>";
// rand($min, $max): 
// Generates a random integer between the specified minimum and maximum 
$min=56;
$max=19999;
echo rand($min,$max)."<br>";
echo "<br>";

echo "Number Formatting"."<br>";
// number_format($number, $decimals, $decimal_point, $thousands_separator): 
// Formats a number with grouped thousands and a specified number of decimals.
echo number_format(299.9);


?>
<?php
echo "PHP Operators" ;
echo "<br>";

echo" Arithmetic Operators:";
$a=6;
$b=4;
echo"a=".$a." "."b=".$b."<br>";

echo"1. Addition:"."<br>";
//    - `$a + $b`
echo $a+$b;
echo "<br>";

echo "2. Subtraction:"."<br>";
//    - `$a - $b`
echo $a-$b;
// if u write "$a-$b" it will get printed as a string and the expression will not ne evaluated
echo "<br>";

echo"3. Multiplication:"."<br>";
//    - `$a * $b`
echo $a*$b;
echo "<br>";

echo"4. Division:"."<br>";
//    - `$a / $b`
echo $a/$b;
echo "<br>";

echo"5. Modulus (Remainder):"."<br>";
//    - `$a % $b`
echo $a%$b;
echo "<br>";

echo"6. Exponentiation:"."<br>";
//    - `$a ** $b` (PHP 5.6 and later)
echo $a ** $b;
echo "<br>";
echo "<br>";


echo "Assignment Operators:"."<br>";

echo"7. Assignment:"."<br>";
//    - `$a = $b`
echo "a=$a"."<br>";
echo "b=$b"."<br>";
$a=$b;
echo "After assignment:";
echo "a=$a"." ";
echo "b=$b"."<br>";
echo "<br>";

echo"8. Addition Assignment:"."<br>";
//    - `$a += $b`
$a=10;
$b=15;
echo $a." ".$b."<br>";
echo "a=".$a += $b;
echo "<br>";

echo"9. Subtraction Assignment:"."<br>";
//    - `$a -= $b`
$a=10;
$b=15;
echo $a." ".$b."<br>";
echo "a=".$a -= $b;
echo "<br>";

echo"10. Multiplication Assignment:"."<br>";
    // - `$a *= $b`
$a=10;
$b=15;
echo $a." ".$b."<br>";
echo "a=".$a *= $b;
echo "<br>";

echo"11. Division Assignment:"."<br>";
    // - `$a /= $b`
    $a=10;
    $b=15;
echo $a." ".$b."<br>";
echo "a=".$a /= $b;    
echo "<br>";

echo"12. Modulus Assignment:"."<br>";
// - `$a %= $b`
$a=10;
$b=15;
echo $a." ".$b."<br>";
echo "a=".$a %= $b; 
echo "<br>";
echo "<br>";


echo"Comparison Operators:";
$a=40.00;
$b=40;

echo"13. Equal:"."<br>";
// - `$a == $b`
if($a==$b){
    echo "Equal";
}
else{
    echo"Not equal";
}
echo "<br>";

echo"14. Identical:"."<br>";
    // - `$a === $b`
if($a === $b){
    echo "Identical";
}
else{
    echo "Not Identical";
}
echo "<br>";

echo"15. Not Equal:"."<br>";
// - `$a != $b` or `$a <> $b`
$a=30.00;
$b=30;
if($a !=$b){
    echo "Yes,not equal";
}
else{
    echo "Equal";
}

echo"16. Not Identical:"."<br>";
// $a !== $b`
if($a !== $b){
    echo"Not Identical";
}
else{
    echo "Identical";
}
echo "<br>";
echo"17. Greater Than:"."<br>";
// $a > $b`
$a=57;
$b=56;
if($a>$b){
    echo "a is greater";
}
else{
    echo "a is less than or equal to b";
}

echo"18. Less Than:"."<br>";
// $a < $b`
if($a <$b){
    echo "a is less than b";
}
else{
    echo"a is greater than or equal to b";
}

echo"19. Greater Than or Equal To:"."<br>";
    // - `$a >= $b`
if($a>=$b){
    echo"a is greater than or equal to b";
}

echo"20. Less Than or Equal To:"."<br>";
    // - `$a <= $b`
if($a>=$b){
    echo"a is greater than or equal to b";
} 
else{
    echo "a is less than b";
} 
echo "<br>";
echo "<br>";


echo"Logical Operators:";
echo"21. Logical AND:"."<br>";
//  - `$a && $b`
$a=90;
$b=24;
echo "a=".$a." "."b=".$b."<br>";
if($a==90 && $b==24){
    echo "both are correct";
}
echo "<br>";

echo"22. Logical OR"."<br>";
    // - `$a || $b`
if($a==90 || $b==23){
    echo "one of the equations is true";
}
echo "<br>";

echo"23. Logical NOT:"."<br>";
    // - `!$a`
    $x = 100;  
if (!($x == 90)) {
    echo "statement is not true";
}
echo "<br>";

echo"Increment and Decrement Operators:"."<br>";

echo"24. Increment:"."<br>";
// - `++$a` or `$a++`
$a=4;
echo "a=".$a."<br>";
$a=++$a +$a++;// in ++$a it id=s first incremented and then used while in $a++ it is first equated and then used
echo $a."<br>";
echo"25. Decrement:"."<br>";
// - `--$a` or `$a--`
$a=4;
echo "a=".$a."<br>";
$a=--$a + $a--."<br>";
echo $a;
echo "<br>";

echo"String Operators:";
echo"26. Concatenation:"."<br>";
// - `$a . $b`
$a="hello";
$b="world";
echo $a.$b;
echo "<br>";

echo"27. Concatenation Assignment:"."<br>";
// - `$a .= $b`
$a="a";
$b="b";
echo "Before :a=".$a;
$a .=$b;
echo "After: a=".$a;
echo "<br>";

echo" Conditional (Ternary) Operator:"."<br>";

echo"33. Ternary:"."<br>";
// - `$a ? $b : $c`
$age=17;
echo ($age>=18) ? "Legal age" :"Minor";

?>
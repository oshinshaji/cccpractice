<?php
echo "Exercise 3";
echo "<br>";
$sentence = "The quick brown fox jumps over the lazy dog";
echo strpos($sentence,"fox");
echo "<br>";

if (str_contains($sentence, "cat")) {
    echo "yes 'cat' is present in the sentence";
}
else{
    echo " No,'cat' is not present";}
echo "<br>";

echo "First 20 characters of the sentence: ";
echo substr($sentence,0,20);

?>
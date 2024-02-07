<?php

$text = "Hello, World! How are you doing?";
echo "String length: ";
echo strlen($text);
echo "<br>";

echo "In lowercase: ";
echo strtolower($text);
echo "<br>";

echo "In uppercase: ";
echo strtoupper($text);
echo "<br>";

echo "Replaced: ";
echo str_replace("How are you doing?","Fine, thank you!",$text);
echo "<br>";

echo "First 10 characters: ";
echo substr($text,0,10);
echo "<br>";


echo "8th character to the end: ";
echo substr($text,7);
?>
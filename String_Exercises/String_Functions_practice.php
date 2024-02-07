<?php
echo "helloo";

// 1.strlen($string):
echo "<br>1) ";
echo strlen("qwerty");


// 2.str_replace($search, $replace, $subject):
echo "<br>2) ";
$text="This is for testing";
$srch=" is";
$rep=" was";
echo str_replace($srch,$rep,$text);

// 3.strpos($haystack, $needle):
echo "<br>3) ";
$text="Good morning everyone";
$needle="morning";
echo strpos($text,$needle);


// 4.substr($string, $start, $length):
echo "<br>4) ";
echo substr("this is the text",5,5);


// 5.strtolower($string):
echo "<br>5) ";
echo strtolower("THIS WILL bEcOmE LOWERcase");


// 6.strtoupper($string):
echo "<br>6) ";
echo strtoupper("This will become upperCase");


// 7.trim($string):
echo "<br>7) ";
$text="this is tesing th";
echo trim($text,"th");
// echo $after_trimming;


// 8.implode($glue, $pieces):
echo "<br>8) ";
$arr = array(
    "a" => "apple",
    "b" => "ball",
    "c" => "call",
    "d" => "doll",
    "e" => "eel",
    "f" => "fall",
);
$str=implode(",,", $arr);
echo $str;


// 9.explode($delimiter, $string): //doubt
echo "<br>9) ";
$str="This,will get,converted into array,of four";
$del=",";
$arr=explode($del,$str);
print_r($arr);


// 10.htmlspecialchars($string):
echo "<br>10) ";
$text="Special <b>bold</b> charaters";
echo $text;
echo htmlspecialchars($text);


// 11.htmlentities($string): //doubt
echo "<br>11) ";

// 12.nl2br($string):
echo "<br>12) ";
echo nl2br("this\nwill\nbreak\ninto\nsix\nnew lines");


// 13.str_repeat($string, $multiplier):
echo "<br>13) ";
echo str_repeat("four ","4");


// 14.strrev($string):
echo "<br>14) ";
echo strrev("dcba");


// 15.str_shuffle($string):
echo "<br>15) ";
echo str_shuffle("this will be shuffled");


// 16.str_split($string, $length):
echo "<br>16) ";
$arr=str_split("this will be split with 6 characters each ","6");
print_r($arr);


// 17.str_word_count($string):
echo "<br>17) ";
echo str_word_count("how many words are there");

// 18.substr_replace($string, $replacement, $start, $length):
echo "<br>18) ";
echo substr_replace("Under-achievement","over",0,5);


// 19.str_pad($string, $length, $pad_string, $pad_type):
echo "<br>19) ";
$text ="this will be displayed in many single quotes";
$len=strlen($text);
$ps="'";
// echo $len;
echo str_pad($text,51,$ps,STR_PAD_BOTH);


// 20.strcmp($string1, $string2): //doubt
echo "<br>20) ";
echo strcmp("abd","abcc");

// 21.strcoll($string1, $string2)://doubt
echo "<br>21) ";
echo strcoll("abd","abcc");

// 22.strcspn($string, $mask, $start, $length):
echo "<br>22) ";
echo strcspn("this is a test abc","s",0,18);

// 23.stristr($haystack, $needle, $before_needle):
echo "<br>23) ";
$text="Good morning everyone";
$ndl="o";
echo stristr($text,$ndl,false);


// 24.strpbrk($string, $char_list)://CASE SENSITIVE
echo "<br>24) ";
echo strpbrk("this is a String","S");


/* // 25.strrev($string): //repeat
echo "<br>25) ";
echo "baki"; */

// 25.strstr($haystack, $needle, $before_needle):
    //this is case sensitive
echo "<br>25) ";
echo strstr("this is a String","S");
echo "<br>";
echo stristr("this is a String","S");


// 26.strtr($string, $from, $to):
echo "<br>26) ";
$string="BKBMabcdefghijk";
$from="abcd";
$to="1234";
echo strtr($string,$from,$to);


// 27.ucfirst($string):
echo "<br>27) ";
echo ucfirst("this is a string");


// 28.ucwords($string):
echo "<br>28) ";
echo ucwords("this is a string");

// 29.empty($string): //1 if empty or doesn't exist or else null 
echo "<br>29) ";
$text="";
// echo empty($text);
if (empty($text2)) {
    echo "Empty";
  }
  else{
    echo "Not empty";
  }


// 30.strtok($string):
echo "<br>30) ";
// echo strtok("this is a \n str\ning","\n");
$string = "This is \nan example\nstring";
/* Use tab and newline as tokenizing characters as well  */
$tok = strtok($string, "\n");
echo $tok;
echo "<br>";
// echo strtok("\n");
$tok =strtok("\n");
echo $tok;


?>
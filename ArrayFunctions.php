<?php

echo "Array Creation and Initialization:"."<br>";

echo "1. array() or []:"."<br>";
$a1=array("apple","bag","cat","dog");
$a2=array("orange","bag","cat","dog");
print_r($a1)."<br>";
//    - Creates a new array.
echo "2. array_merge():"."<br>";
//    - Merges two or more arrays.
$a3= array_merge($a1,$a2);
print_r($a3);
echo "<br>";

echo "3. array_combine():"."<br>";
//    - Creates an array by using one array for keys and another for its values.
print_r(array_combine($a1,$a2));
echo "<br>";

echo "4. range():"."<br>";
//    - Creates an array containing a range of elements.
echo "<br>";

echo " Array Modification:"."<br>";
/* 
echo "5. array_push() ."<br>";
or $array[] = $element:" */
//    - Adds one or more elements to the end of an array.
array_push($a1,"eye");
print_r($a1);
echo "<br>";

echo "6. array_pop():"."<br>";
//    - Removes the last element from an array.
array_pop($a1);
print_r($a1);
echo "<br>";

echo "7. array_unshift():"."<br>";
//    - Adds one or more elements to the beginning of an array.
array_unshift($a1,"feather");
print_r($a1);
echo "<br>";

echo "8. array_shift():"."<br>";
//    - Removes the first element from an array.
array_shift($a1);
print_r($a1);
echo "<br>";

echo "9. array_splice():"."<br>";
//    - Removes a portion of the array and replaces it with something else.
array_splice($a1,2,2,"replaced");
echo "<br>";

echo "Array Access:"."<br>";

echo "10. count():"."<br>";
    // - Counts the number of elements in an array.
    echo count($a2);
    echo "<br>";
echo "11. sizeof():"."<br>";
    // - Alias of count().
    echo sizeof($a2);
    echo "<br>";

echo "12. array_key_exists():"."<br>";
    // - Checks if the given key or index exists in the array.
    if(array_key_exists(3,$a1))
    {
        echo"yes,exists";
    }
    else{
        echo"no,doesn't";
    };
    echo "<br>";
echo "13. array_keys():"."<br>";
    // - Returns all the keys or a subset of the keys of an array.
    print_r(array_keys($a1)) ;
    echo "<br>";
echo "14. array_values():"."<br>";
    // - Returns all the values of an array.
    print_r(array_values($a1));
    echo "<br>";
echo "Array Search:"."<br>";

echo "15. in_array():"."<br>";
    // - Checks if a value exists in an array.
    echo in_array("apple",$a1);
    echo "<br>";
echo "16. array_search():"."<br>";
    // - Searches an array for a given value and returns the corresponding key.
    print_r(array_search("apple",$a1));
    echo "<br>";
echo "17. array_reverse():"."<br>";
    // - Returns an array with elements in reverse order.
print_r( array_reverse($a2));
echo "<br>";
echo "<br>";

echo "Array Sorting:"."<br>";

echo "18. sort():"."<br>";
    // - Sorts an array.
    sort($a1);
    print_r($a1);
    echo "<br>";
echo "19. rsort():"."<br>";
    // - Sorts an array in reverse order.
    rsort($a1);
    print_r($a1);
    echo "<br>";
$a4=array("a"=>"apple", "b"=>"bag", "c"=>"cat");

echo "20. asort():"."<br>";
    // - Sorts an associative array by values.
asort($a4);
print_r($a4);
echo "<br>";

echo "21. ksort():"."<br>";
    // - Sorts an associative array by keys.
ksort($a4);
print_r($a4);
echo "<br>";

echo "22. arsort():"."<br>";
    // - Sorts an associative array in reverse order by values.
    arsort($a4);
    print_r($a4);
    echo "<br>";

echo "23. krsort():"."<br>";
    // - Sorts an associative array in reverse order by keys.
    krsort($a4);
    print_r($a4);
    echo "<br>";

echo "Array Filtering:"."<br>";

$arr=array(1,2,3,4,5,6,7,8,9,10);

echo "24. array_filter():"."<br>";
    // - Filters elements of an array using a callback function.
function even($var)
  {
    $v=$var % 2;
  return($v ==0);
  }
$arr2=array_filter($arr,"even");
print_r($arr2);
echo "<br>";

function mul($var){
    return ($var * 2);
};

echo "25. array_map():"."<br>";
    // - Applies a callback function to each element of an array.
    $arr2=array_map("mul", $arr);
    print_r($arr2);
    echo "<br>";

echo "26. array_reduce():"."<br>";
    // - Iteratively reduces the array to a single value using a callback function.

    $arr2=array_reduce($arr,"mul");
    print_r($arr2);
echo "<br>";

echo "Array Slicing:"."<br>";

echo "27. array_slice():"."<br>";
    // - Extracts a portion of the array.
    print_r(array_slice($a2,2));
echo "<br>";
echo "<br>";

echo "28. array_splice():"."<br>";
    // - Removes a portion of the array and replaces it with something else.
    print_r(array_splice($a1,0,2,$a2));


?>
<?php

echo "If Statement:"."<br>" ;
//     The `if` statement is used to execute a block of code if a specified condition is true.
//     <?php
    $age=18;
    if ($age>=18) {
        echo "You can legally vote in India";
        //this will be executed only if the condition is true else nothing will be printed;
    }
echo "<br>";
echo "<br>";
  
    

echo "If-Else Statement:"."<br>";
// The `if-else` statement allows you to execute one block of code if a condition is true and another block if the condition is false.
    $age=17;

    if ($age>=17) {
        echo "You can't legally vote in India";
    } else {
        // Code to be executed if the condition is false
        echo "You can legally vote in India";
    }
echo "<br>";
echo "<br>";

echo "If-Elseif-Else Statement:"."<br>";

    //The `if-elseif-else` statement allows you to check multiple conditions in sequence.
    $number = 10;

    if ($number > 0) {
        echo "Number is positive.";
    } elseif ($number < 0) {
        echo "Number is negative.";
    } else {
        echo "Number is zero.";
    }

echo "<br>";
echo "<br>";

echo"Nested If Statements:"."<br>";

    //You can also nest `if` statements inside each other to create more complex conditional logic.

    $performance = 1;
    $communication =1 ;

    if ($performance) {
        if ($communication) {
            // Code to be executed if both conditions are true
            echo "Promoted";
        } else {
            // Code to be executed if only the first condition is true
            echo "Salary incremented";
        }
    } else {
        // Code to be executed if the first condition is false
        echo "You need improvement";
    }


?>
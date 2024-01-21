<?php
// Certainly! Loops in PHP allow you to execute a block of code repeatedly. Here are examples of the three main types of loops: `for`, `while`, and `foreach`. You can use these examples for training:

    echo "1. For Loop:"."<br>";
       // The `for` loop is used when you know in advance how many times the loop should run.        
    
            // Example: Print numbers from 1 to 5 using a for loop
            for ($i = 1; $i <= 5; $i++) {
                echo $i . " ";
            }
    echo "<br>";
    echo "<br>";
            // Output: 1 2 3 4 5
            
    echo "2. While Loop:"."<br>";
        //The `while` loop is used when you don't know in advance how many times the loop should run, and it continues as long as a specified condition is true.
            // Example: Print numbers from 1 to 5 using a while loop
            $i = 1;
            while ($i <= 5) {
                echo $i . " ";
                $i++;
            }
    
            // Output: 1 2 3 4 5

    echo "<br>";
    echo "<br>";
    
    echo "3. Foreach Loop:"."<br>";
        //The `foreach` loop is specifically designed for iterating over arrays.
    
    
            // Example: Iterate over an array and print each element
            $colors = array("Red", "Green", "Blue");
            foreach ($colors as $colors) {
                echo $colors . " ";
            }
    
            // Output: Red Green Blue
    
?>


    <?php

// Certainly! The `switch` statement in PHP is used for efficient conditional 
// operations where you have a single expression that you want to compare to multiple possible values. 
// Here's an example of how to use the `switch` statement for training:
       // Sample variable to be evaluated
       $dayOfWeek = "Monday";
   
       // Using switch to check different cases
       switch ($dayOfWeek) {
           case "Monday":
               echo "It's the start of the week!";
               break;
   
           case "Tuesday":
           case "Wednesday":
           case "Thursday":
               echo "It's a weekday.";
               break;
   
           case "Friday":
               echo "TGIF! It's Friday!";
               break;
   
           case "Saturday":
           case "Sunday":
               echo "It's the weekend!";
               break;
   
           default:
               echo "Invalid day of the week.";
       }
   /*    
       Explanation:
       - The `switch` statement evaluates the value of `$dayOfWeek`.
       - Each `case` checks whether it matches a specific day of the week.
       - The `break` statement terminates the `switch` statement once a match is found. If omitted, execution would continue to the next `case`.
       - The `default` case is executed if none of the specified cases match.
    */

       ?>

       

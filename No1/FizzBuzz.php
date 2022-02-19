<?php
    for($num = 1;$num <= 100;$num++){
        if($num % 15 == 0){
            echo $num.'FizzBuzz<br>';
        } else if($num % 3 == 0){
            echo $num.'Fizz<br>';
        } else if($num % 5 == 0){
            echo $num.'Buzz<br>';
        } else {
            echo $num.'<br>';
        }
    }
?>
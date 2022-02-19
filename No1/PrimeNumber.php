<?php
    for($x = 2;$x <= 10000;$x++){
        $count = 0;
        for($y = 1;$y <= $x;$y++){
            if($x % $y == 0){
                $count++;
            }
        }
        if($count == 2){
            echo $x.'<br>';
        }
    }
?>
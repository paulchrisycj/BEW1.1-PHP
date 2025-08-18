<?php

function calculateAverage($array){
    if(!is_array($array)){
        return "Error: Please provide an array";
    }
    $sumOfArray = 0;
    foreach($array as $value){
        if(!is_numeric($value)){
            return "Error: One of the values in the array is not a number";
        }
        $sumOfArray += $value;
    }
    return $sumOfArray / count($array);
}

$numbers = 10;
// $numbers = [10, 20, 30, 40, ""];

echo "<h1>The average of the array is: " . calculateAverage($numbers) . "</h1>";
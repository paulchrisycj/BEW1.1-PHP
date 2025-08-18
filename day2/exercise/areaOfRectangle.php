<?php

function calculateRectangleArea($length, $width){
    return $length * $width;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area of Rectangle Exercise</title>
</head>
<body>
    <h1>The area of the rectangle is: <?= calculateRectangleArea(50, 2) ?></h1>
</body>
</html>
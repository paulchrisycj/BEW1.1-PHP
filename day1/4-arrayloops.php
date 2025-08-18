<style>
    *{
        font-size: 36px;
    }
</style>
<?php
    $fruits = array("apple", "banana", "cherry");
    // They both mean the same thing.
    $fruits = ["apple", "banana", "cherry"];

    // foreach ($fruits as $fruit){
    //     echo $fruit . " ";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array and Loops</title>
</head>
<body>
    <h1>Fruits</h1>
    <ul>
        <?php
            foreach ($fruits as $fruit){
                echo "<li>$fruit</li>";
            }
        ?>
    </ul>
</body>
</html>
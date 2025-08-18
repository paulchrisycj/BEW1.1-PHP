<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Echo Syntax</title>
    <style>
        h1{
            color: <?= "blue" ?>
        }
    </style>
</head>
<body>
    <?php 
        $name = "Paul";
        $age = 13;

        $studentName = "Chris";
        $studentAge = 13;

        
    ?>

    <h1>My name is <?= $name ?> and I am <?= $age ?> years old</h1>
    <h2>and with my age I can
        <?php 
            if($age > 18){
                echo " enter the bar";
            } else {
                echo "not enter the bar";
            }
        ?>
        and I am sad
    </h2>

    <p>Student Name: <?= $studentName ?></p>
    <p>Student Age: <?= $studentAge ?></p>
</body>
</html>
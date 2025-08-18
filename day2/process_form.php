<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Form</title>
</head>
<body>
    <?php
        $newsletter = null;
        if(isset($_GET["newsletter"])){
            $newsletter = $_GET["newsletter"];
        }
    ?>
    <h1>The user's name is <?= $_GET['name']; ?></h1>
    <h1>The user's age is <?= $_GET['age']; ?></h1>
    <h1>The user is subscribed to newsletter <?= $newsletter; ?></h1>
</body>
</html>
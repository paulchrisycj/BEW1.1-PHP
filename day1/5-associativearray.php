<?php
$PaulUser = [
    'name' => 'Paul',
    'age' => 29,
    'is_student' => false
    //Key => Value
];
$users = [
    [
        'name' => 'Paul',
        'age' => 29,
        'is_student' => false
    ],
    [
        'name' => "Janet",
        "age" => 15,
        "is_student" => true
    ]
];

echo $users[0]["name"]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Array and Key Value Pairs</title>
</head>

<body>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?= $user['name'] ?>, (<?= $user['age'] ?> years old)</li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
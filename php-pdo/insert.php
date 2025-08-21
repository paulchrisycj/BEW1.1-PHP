<?php
//          For me it's localhost;port=8889, for you will be just localhost
$db = new PDO("mysql:host=localhost;port=8889;dbname=intro_to_sql", "root", "root");
//          Also, for me both username and password will be "root", but for you guys the 
//          password will be empty

// $query = "SELECT * FROM user;";
$insert = "INSERT INTO user (id, name, email) VALUES (:id, :name, :email)";
$statement = $db->prepare($insert);

$id = 4;
$name = "Ah Fai";
$email = "faige@gmail.com";

$statement->execute(array(
    ':id' => $id,
    ':name' => $name,
    ':email' => $email,
));
print_r($statement);


?>
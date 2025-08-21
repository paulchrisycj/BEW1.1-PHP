<?php
//          For me it's localhost;port=8889, for you will be just localhost
$db = new PDO("mysql:host=localhost;port=8889;dbname=intro_to_sql", "root", "root");
//          Also, for me both username and password will be "root", but for you guys the 
//          password will be empty

// $query = "SELECT * FROM user;";
// $insert = "INSERT INTO user (id, name, email) VALUES (:id, :name, :email)";
$update = "UPDATE user SET name = :name, email = :email WHERE id = :id";
$statement = $db->prepare($update);

$id = 4;
$name = "Ah Yang";
$email = "Yangge@gmail.com";

$statement->execute(array(
    ':name'=>$name,
    ':email'=>$email,
    ':id'=>$id,
));
print_r($statement);

?>
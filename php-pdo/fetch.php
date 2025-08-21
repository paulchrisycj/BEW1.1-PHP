<?php
//          For me it's localhost;port=8889, for you will be just localhost
$db = new PDO("mysql:host=localhost;port=8889;dbname=intro_to_sql", "root", "root");
//          Also, for me both username and password will be "root", but for you guys the 
//          password will be empty
$query = "SELECT * FROM user;";
$statement = $db->prepare($query);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// $result = $statement->fetch(PDO::FETCH_BOTH);
// $result = $statement->fetchAll();

// $result = $db->query('SELECT * FROM user');
print_r($result);
echo "<br><h1>The user's name is ";
echo $result[0]["name"];
echo "</h1>"

?>
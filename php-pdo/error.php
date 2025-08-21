<?php
// Teaches you how to handle errors in PHP PDO

try{
    //          For me it's localhost;port=8889, for you will be just localhost
    $db = new PDO("mysql:host=localhost;port=8889;dbname=intro_to_sql", "root", "root");
    //          Also, for me both username and password will be "root", but for you guys the 
    //          password will be empty
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $query = "SELECT * FROM user;";
    $insert = "INSERT INTO test (name, age) VALUES ('John', 25)";
    $result = $db->exec($insert);
    print_r($result);
}catch(PDOException $e){
    echo $e->getMessage();
}

?>
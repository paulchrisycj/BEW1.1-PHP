<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $comments = $_REQUEST["comments"];

    if(empty($comments)){
        echo "<h1>Error: No comment is sent</h1>";
    }else{
        echo "<h1>Feedback form received</h1>";
        echo "<h2>Name: $name</h2>";
        echo "<h2>Email: $email</h2>";
        echo "<h2>Comment: $comments</h2>";
    }
}

?>
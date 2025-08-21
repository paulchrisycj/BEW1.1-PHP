<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    if($username == "admin" && $password == "password123"){
        $_SESSION["username"] = $username;
        if(isset($_REQUEST["rememberme"])){
            setcookie("username", $username, time() + (7 * 24 * 60 * 60));
        }
        header("Location: dashboard.php");
        exit();
    }
    header("Location: login.html");
}

?>
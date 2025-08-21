<?php
session_start();

if(isset($_GET["logout"])){
    if($_GET["logout"] == "true"){
        session_unset();
        session_destroy();
        setcookie("username", "", time() - 3600);
        header("Location: login.html");
    }
}

if(!isset($_SESSION["username"])){
    header("Location: login.html");
    exit;
}

$username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : $_SESSION["username"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($username); ?></h1>
    <p><a href="?logout=true">Log out</a></p>
</body>
</html>
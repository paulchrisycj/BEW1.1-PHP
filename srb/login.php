<?php
session_start();
$db = new PDO("mysql:host=localhost;port=8889;dbname=srb", "root", "root");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $selectQuery = "SELECT * FROM users WHERE email = :email";
    
    $result = $db->prepare($selectQuery);
    $result->execute(array(
        ":email" => $email
    ));

    $result = $result->fetch(PDO::FETCH_ASSOC);
    if($result['password'] == $password){
        $_SESSION['user'] = array(
            "email" => $result['email'],
            "role" => $result['role']
        );
        header("Location: dashboard.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRB Login</title>
</head>

<body>
    <form method="POST">
        Email:
        <input type="text" name="email"><br>
        Password:
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
</body>

</html>
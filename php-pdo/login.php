<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    try{
        // Connection to DB
        //          For me it's localhost;port=8889, for you will be just localhost
        $db = new PDO("mysql:host=localhost;port=8889;dbname=phppdo", "root", "root");
        //          Also, for me both username and password will be "root", but for you guys the 
        //          password will be empty
        // Connection to DB
        
        // This is the code for retrieving username from DB
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->execute(array(
            ':username'=>$username
        ));

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        // This is the code for retrieving username from DB

        //This is to check if username has any matches
        if($result === false){
            echo "<h1>The username does not exist</h1>";
            exit;
        }

        //This is to check if password matches the user's password
        if($password == $result["password"]){
            echo "<br><h1>The user is authenticated</h1>";
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $result["name"];
            header("Location: dashboard.php");
            exit();
        }else{
            echo "<h1>The user is not authenticated</h1>";
        }
    }catch(PDOException $e){
        $e->getMessage();
    }

    // if($username == "admin" && $password == "password123"){
    //     $_SESSION["username"] = $username;
    //     if(isset($_REQUEST["rememberme"])){
    //         setcookie("username", $username, time() + (7 * 24 * 60 * 60));
    //     }
    //     header("Location: dashboard.php");
    //     exit();
    // }
    // header("Location: login.html");
}

?>
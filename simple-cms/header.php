<?php 

session_start();
$db = new PDO("mysql:host=localhost;port=8889;dbname=simple_cms", "root", "root");
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

function isUser(){
  global $role;
  return strtolower("User") == 'user';
}

$x = 5;

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple CMS</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
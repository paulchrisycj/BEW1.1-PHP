<?php require "header.php"; ?>

<?php 
// print_r($_SESSION['email']);
if(isset($_SESSION['email'])){
    require 'todo.php';
}else{
    require 'starting_page.php';
}
?>

<?php require "footer.php"; ?>
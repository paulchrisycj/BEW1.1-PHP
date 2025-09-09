<?php

//To get the path of the request
$path = $_SERVER['REQUEST_URI'];
// print_r($path);
$path = explode("/", $path);
print_r($path[count($path) - 1]);
// $path = parse_url( $path, PHP_URL_PATH );

$endPath = $path[count($path) - 1];

switch($endPath){
    case "about":
        require('./about.php');
        break;
    case "contact":
        require('./contact.php');
        break;
    case "home":
        require('./home.php');
        break;
}

?>
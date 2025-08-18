<?php

function greetings(){
    return "Hello, World";
}
function fullName($firstName, $lastName) {
    return $firstName . ' ' . $lastName;
}

$firstName = "Paulchris";
$lastName = "Yeow";

echo fullName($firstName, $lastName);

?>

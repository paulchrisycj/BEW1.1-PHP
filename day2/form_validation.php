<?php
    $name = $_REQUEST["name"];

    if(empty($name)){
        echo "Please enter your name<br>";
    }else{
        echo "Hello, " . htmlspecialchars($name) . "<br>";
    }

    // Validating Email
    $email = $_REQUEST["email"];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Valid email: " . htmlspecialchars($email) . "<br>";
    }else{
        echo "Invalid Email Format" . "<br>";
    }

    //Validate number via function
    function validate_age($age, $min = 1, $max = 100){
        if(is_numeric($age) && $age >= $min && $age <= $max){
            return true;
        }else{
            return false;
        }
    }

    $age = $_REQUEST["age"];

    if(validate_age($age)){
        echo "Valid age: " . htmlspecialchars($age);
    }else{
        echo "Invalid age. Please enter a number between 1 and 100";
    }
?>
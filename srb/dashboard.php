<?php
session_start();

function isAdmin(){
    // check if user's session is available or not
    if ( isset( $_SESSION['user'] ) ) {
        // check if user is an admin
        if ( $_SESSION['user']['role'] === 'admin' ) {
            return true;
        }
    } 
    return false;
}
function isEditor() {
    // check if user's session is available or not
    if ( isset( $_SESSION['user'] ) ) {
        // check if user is an admin
        if ( 
            $_SESSION['user']['role'] === 'editor' || 
            $_SESSION['user']['role'] === 'admin' 
        ) {
            return true;
        } 
    } 
        
    return false;
}
function isUser() {
    // check if user's session is available or not
    if ( isset( $_SESSION['user'] ) ) {
        // check if user is an admin
        if ( 
            $_SESSION['user']['role'] === 'admin' || 
            $_SESSION['user']['role'] === 'editor' || 
            $_SESSION['user']['role'] === 'user' 
        ) {
            return true;
        } 
    } 
        
    return false;
}

if(isAdmin()){
    echo "<h1>User is an admin</h1>";
}

if(isEditor()){
    echo "<h1>User is an editor</h1>";
}

if(isUser()){
    echo "<h1>User is a user</h1>";
}

?>
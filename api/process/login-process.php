<?php
session_start();
include_once("../utils/user.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = new User();
    $result = $user->getUser($username);
    
    if($result && password_verify($password, $result[0]["users_password"])){
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $result[0]["users_email"];
        $_SESSION["id"] = $result[0]["users_id"];
        header("Location: ../../index.php");
    } 
    else {
        header("Location: ../../login.php?error=wrongcredentials");
    }
} 
else {
    header("Location: ../../login.php?error=wrongcredentials");
}
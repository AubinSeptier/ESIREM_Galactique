<?php
session_start();
include_once("../utils/user.php");

if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password-repeat"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];
    
    if($password !== $passwordRepeat){
        header("Location: ../../register.php?error=passwordsdontmatch");
        exit();
    }
    
    $user = new User();
    $result = $user->getUser($username);
    
    if($result){
        header("Location: ../../register.php?error=usernametaken");
        exit();
    }
    
    $user->setUser($email, $username, password_hash($password, PASSWORD_BRCYPT));
    header("Location: ../../login.php");
} 
else {
    header("Location: ../../register.php?error=wrongcredentials");
    exit();
}
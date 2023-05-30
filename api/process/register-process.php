<?php
session_start();
include_once("../classes/user.php");

if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password-repeat"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];
    
    if($password !== $passwordRepeat){
        echo "Les mots de passe ne correspondent pas";
        exit();
    }
    
    $user = new User();
    $result = $user->getUser($username);
    
    if($result){
        echo "Ce nom d\'utilisateur existe déjà";
        exit();
    }
    
    $user->setUser($email, $username, $password);
    header("Location: ../../front/login.php");
} 
else {
    echo "Erreur de connexion";
    exit();
}
<?php
session_start();
include_once("../classes/user.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = new User();
    $userData = $user->getUser($username);
    
    if($userData && password_verify($password, $userData[0]["password"])){
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $userData[0]["id"];
        header("Location: ../../front/player.php");
    } 
    else {
        echo "Nom d\'utilisateur ou mot de passe incorrect";
    }
} 
else {
    echo "Erreur de connexion";
}
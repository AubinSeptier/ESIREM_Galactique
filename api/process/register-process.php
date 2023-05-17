<?php
session_start();
include_once("../classes/user.php");

if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password-repeat"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];
    
    if($password !== $passwordRepeat){
        echo "Erreur mdp différents";
        exit();
    }

    if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/", $email)){
        echo "Email incorrect";
        exit();
    }
    
    $user = new User();
    $result = $user->getUser($username);
    
    if($result){
        echo "Utilisateur déjà existant";
        exit();
    }
    
    $user->setUser($email, $username, $password);
    header("Location:http://localhost/ESIREM_Galactique/front/login.html");
} 
else {
    echo "Erreur de champs";
    exit();
}
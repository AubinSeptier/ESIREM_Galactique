<?php
session_start();
include_once("../classes/user.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = new User();
    $result = $user->getUser($username);
    
    if($result && password_verify($password, $result[0]["password"])){
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $result[0]["email"];
        $_SESSION["id"] = $result[0]["id"];
        header("Location:http://localhost/ESIREM_Galactique/front/index.php");
    } 
    else {
        echo "Nom d\'utilisateur ou mot de passe incorrect";
    }
} 
else {
    echo "Erreur de connexion";
}
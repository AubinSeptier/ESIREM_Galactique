<?php
/**
 * @file login-process.php
 * Fichier contenant le système complet de connexion à un compte.
 * 
 * @page login login-process.php
 * 
 * Cette fonction réalise le processus de connexion à un compte en utilisant la classe
 * User.
 * Elle récupère les données nécessaires depuis la superglobale $_POST et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et connecte l'utilisateur avec les paramètres donnés.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si les paramètres requis ($_POST["username"], $_POST["password"]) sont définis.
 * - Initialise l'objet nécessaire (User).
 * - Vérifie si l'utilisateur existe.
 * - Vérifie si le mot de passe est correct.
 * - Connecte l'utilisateur.
 * - Redirige l'utilisateur vers la page principale de l'utilisateur.
 * 
 * @throws Exception_1 Si l'utilisateur ou le mot de passe est incorrect, renvoie un message d'erreur.
 * @throws Exception_2 Si les superglobalse POST ne sont pas récupérées ou vides, renvoie un message d'erreur.
 */
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
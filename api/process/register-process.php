<?php
/**
 * @file register-process.php
 * Fichier contenant le système complet d'inscription à un compte.
 * 
 * @page register register-process.php
 * 
 * Cette fonction réalise le processus d'inscription à un compte en utilisant la classe
 * User.
 * Elle récupère les données nécessaires depuis la superglobale $_POST et la superglobale $_SESSION.
 * Elle effectue les vérifications nécessaires et crée un compte avec les paramètres donnés.
 * 
 * La fonction effectue les étapes suivantes :
 * - Vérifie si les paramètres requis ($_POST["email"], $_POST["username"], $_POST["password"], $_POST["password-repeat"]) sont définis.
 * - Initialise l'objet nécessaire (User).
 * - Vérifie si les deux mots de passe correspondent.
 * - Vérifie si le nom d'utilisateur existe déjà.
 * - Crée un nouveau compte avec les paramètres donnés.
 * - Redirige l'utilisateur vers la page de connexion.
 * 
 * @throws Exception_1 Si les mots de passe ne correspondent pas, renvoie un message d'erreur.
 * @throws Exception_2 Si le nom d'utilisateur existe déjà, renvoie un message d'erreur.
 * @throws Exception_3 Si les superglobalse POST ne sont pas récupérées ou vides, renvoie un message d'erreur.
 * 
 */
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
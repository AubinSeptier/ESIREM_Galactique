<?php
/**
 * @file user.php
 * @details Ce fichier contient la classe User qui est utilisée pour gérer les utilisateurs.
 */
include_once("database.php");

class User extends Database {
    
    /**
    * @fn getUser($username)
    * @brief Obtenir toutes les informations sur un utilisateur à partir de son nom d'utilisateur.
    * @param $username Le nom d'utilisateur de l'utilisateur à récupérer.
    * @return $result Un tableau d'informations sur l'utilisateur ou false si l'utilisateur n'existe pas.
    */
    public function getUser($username){
        $sql = "SELECT * FROM users WHERE username = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$username]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @fn setUser($email, $username, $password)
    * @brief Ajouter un utilisateur et ses informations à la base de données.
    * @param $email L'adresse mail de l'utilisateur.
    * @param $username Le nom d'utilisateur de l'utilisateur.
    * @param $password Le mot de passe de l'utilisateur qui sera haché.
    */
    public function setUser($email, $username, $password){
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT into users(email, username, password) VALUES (?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$email, $username, $password]);
    }
}
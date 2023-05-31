<?php
/**
 * @file user.php
 * @details Ce fichier contient la classe User qui est utilisée pour gérer les utilisateurs.
 */
include_once("database.php");

class User extends Database {
    
    public function getUser($username){
        $sql = "SELECT * FROM users WHERE username = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$username]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setUser($email, $username, $password){
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT into users(email, username, password) VALUES (?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$email, $username, $password]);
    }
}
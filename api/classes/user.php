<?php
include_once("../database.php");

class User extends Database {
    
    protected getUser($username){
        $sql = "SELECT * FROM users WHERE username = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$username])
        $result = $query->fetchAll();
        return $result;
    }

    protected setUser($email, $username, $password){
        $sql = "INSERT into users(users_email, users_username, users_password) VALUES (?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$email, $username, $password]);
    }
}
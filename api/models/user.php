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

    protected setUser($username, $email, $password){
        $sql = "INSERT into users(users_username, users_email, users_password) VALUES (?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$username, $email, $password]);
    }
}
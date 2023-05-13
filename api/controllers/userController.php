<?php
include_once("../models/user.php");

class UserController {
    public function createUser($username, $email, $password){
        $this->setUser($username, $email, $password);
    }
}
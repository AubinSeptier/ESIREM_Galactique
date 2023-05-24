<?php
include_once 'database.php';

// To complete

class Research extends Database {

    public function getResearch($name){
        $sql = "SELECT * FROM researches WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setResearch($name, $empire){
        $sql = "INSERT into researches(name, empire) VALUES (?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $empire]);
    }
}
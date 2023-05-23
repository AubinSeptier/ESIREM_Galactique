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

    public function setResearch($id, $name, $empire){
        $sql = "INSERT into researches(id, name, empire) VALUES (?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id, $name, $empire]);
    }
}
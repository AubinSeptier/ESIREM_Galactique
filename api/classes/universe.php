<?php
include_once("database.php");

class Universe extends Database {
    
    public function getUniverse($name){
        $sql = "SELECT * FROM universes WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setUniverse($name){
        $sql = "INSERT into universes(name) VALUES (?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id, $name]);
    }
}
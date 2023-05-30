<?php
include_once("database.php");

class Universe extends Database {
    
    // Récupérer un univers par son nom
    public function getUniverseByName($name){
        $sql = "SELECT * FROM universes WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    // Modifier les caractéristiques d'un univers
    public function setUniverse($name){
        $sql = "INSERT into universes(name) VALUES (?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id, $name]);
    }

    // Récupérer un univers par son id
    public function getUniverseById($id){
        $sql = "SELECT * FROM universes WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }
}
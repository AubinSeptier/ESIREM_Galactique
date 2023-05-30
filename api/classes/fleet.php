<?php
include_once("database.php");

class Fleet extends Database {
        
    // Récupérer une flotte par son id
    public function getFleet($id){
        $sql = "SELECT * FROM fleets WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }
    
    // Ajouter une nouvelle flotte et ses caractéristiques
    public function setFleet($name, $ships_number, $attack, $defense, $id_empire, $id_planet){
        $sql = "INSERT into fleets(name, ships_number, attack, defense, id_empire, id_planet) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $ships_number, $attack, $defense, $id_empire, $id_planet]);
    }

    // Modifier les caractéristiques d'une flotte
    public function updateFleet($name, $ships_number, $attack, $defense, $id_empire, $id_planet){
        $sql = "UPDATE fleets SET name = ?, ships_number = ?, attack = ?, defense = ?, id_empire = ?, id_planet = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $ships_number, $attack, $defense, $id_empire, $id_planet]);
    }
}
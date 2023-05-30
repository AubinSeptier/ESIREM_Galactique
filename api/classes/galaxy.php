<?php
include_once("database.php");

class Galaxy extends Database {
        
    // Récupérer une galaxie par son nom
    public function getGalaxy($name){
        $sql = "SELECT * FROM galaxies WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    // Ajouter une galaxie et ses caractéristiques
    public function setGalaxy($name, $id_universe){
        $sql = "INSERT into galaxies(name, id_universe) VALUES (?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $id_universe]);
    }

    // Récupérer une galaxie aléatoire par l'id de son univers
    public function getRandomGalaxy($id_universe){
        $sql = "SELECT * FROM galaxies WHERE id_universe = ? ORDER BY RAND() LIMIT 1";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_universe]);
        $result = $query->fetchAll();
        return $result;
    }
}
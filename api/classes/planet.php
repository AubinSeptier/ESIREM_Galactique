<?php
include_once("database.php");

class Planet extends Database {
        
    // Récupérer une planète par son nom
    public function getPlanet($name){
        $sql = "SELECT * FROM planets WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    // Ajouter une planète et ses caratéristiques
    public function setPlanet($name, $position, $size, $id_solar_system, $id_empire){
        $sql = "INSERT into planets(name, position, size, id_solar_system, id_empire) VALUES (?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $position, $size, $id_solar_system, $id_empire]);
    }

    // Modifier le propriétaire d'une planète
    public function setPlanetOwner($id_empire, $id_planet){
        $sql = "UPDATE planets SET id_empire = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_empire, $id_planet]);
    }

    // Récupérer le propriétaire d'une planète
    public function getPlanetOwner($id_empire){
        $sql = "SELECT * FROM planets WHERE id_empire = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_empire]);
        $result = $query->fetchAll();
        return $result;
    }

    // Récupérer une planète aléatoire par l'id de son système solaire
    public function getRandomPlanet($id_solar_system){
            $sql = "SELECT * FROM planets WHERE id_solar_system = ? ORDER BY RAND() LIMIT 1";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_solar_system]);
        $result = $query->fetchAll();
        return $result;
    }

    // Modifier le nom d'une planète à partir de son id
    public function setPlanetName($name, $id_planet){
        $sql = "UPDATE planets SET name = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $id_planet]);
    }

    // Récupérer la taille d'une planète à partir de son id
    public function getPlanetSize($id_planet){
        $sql = "SELECT size FROM planets WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchAll();
        return $result;
    }
}
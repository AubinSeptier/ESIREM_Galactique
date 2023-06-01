<?php
/**
 * @file resource.php
 * @details Ce fichier contient la classe Resource qui permet de gérer les ressources.
 */
include_once("database.php");

/**
 * @class Resource
 * @brief Classe permettant de gérer les ressources.
 */
class Resource extends Database {
    
    // Récupérer les ressources d'une planète par l'id de celle-ci
    public function getResource($id_planet){
        $sql = "SELECT * FROM resources WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchAll();
        return $result;
    }
    
    // Ajouter les ressources d'une planète par l'id de celle-ci
    public function setResource($deuterium, $energy, $metal, $id_planet){
        $sql = "INSERT into resources(deuterium, energy, metal, id_planet) VALUES (?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$deuterium, $energy, $metal, $id_planet]);
    }

    // Modifier les ressources d'une planète par l'id de celle-ci
    public function updateResource($deuterium, $energy, $metal, $id_planet){
        $sql = "UPDATE resources SET deuterium = ?, energy = ?, metal = ? WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$deuterium, $energy, $metal, $id_planet]);
    }
}
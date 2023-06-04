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

    /**
    * @fn public function getResource($id_planet)
    * @brief Obtenir les données sur les ressources d'une planète.
    * @param $id_planet L'id de la planète.
    * @return $result Un tableau d'informations sur les ressources de la planète ou false si aucune n'a été trouvée.
    */
    public function getResource($id_planet){
        $sql = "SELECT * FROM resources WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_planet]);
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
    * @fn public function setResource($deuterium, $energy, $metal, $id_planet)
    * @brief Ajouter les ressources d'une planète à la base de données.
    * @param $deuterium Le deuterium produit sur la planète.
    * @param $energy L'énergie produite sur la planète.
    * @param $metal Le métal produit sur la planète.
    * @param $id_planet L'id de la planète.
    */
    public function setResource($deuterium, $energy, $metal, $id_planet){
        $sql = "INSERT into resources(deuterium, energy, metal, id_planet) VALUES (?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$deuterium, $energy, $metal, $id_planet]);
    }

    /**
    * @fn public function updateResource($deuterium, $energy, $metal, $id_planet)
    * @brief Mettre à jour les ressources d'une planète dans la base de données.
    * @param $deuterium Le deuterium produit sur la planète.
    * @param $energy L'énergie produite sur la planète.
    * @param $metal Le métal produit sur la planète.
    * @param $id_planet L'id de la planète.
    */
    public function updateResource($deuterium, $energy, $metal, $id_planet){
        $sql = "UPDATE resources SET deuterium = ?, energy = ?, metal = ? WHERE id_planet = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$deuterium, $energy, $metal, $id_planet]);
    }
}
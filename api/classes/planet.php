<?php
/**
 * @file planet.php
 * @details Ce fichier contient la classe Planet qui est utilisée pour gérer les planètes.
 */
include_once("database.php");

/**
 * @class Planet
 * @brief Classe permettant de gérer les planètes.
 */
class Planet extends Database {
        
    /**
    * @fn getPlanet($name) 
    * @brief Obtenir une planète par son nom. 
    * @param $name
    * @return $result Un tableau d'objets planète ou false si non trouvé.
    */
    public function getPlanet($name){
        $sql = "SELECT * FROM planets WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
    * @fn setPlanet($name, $position, $size, $id_solar_system, $id_empire)
    * @brief Ajouter une planète dans la base de données.
    * @param $name Le nom de la planète.
    * @param $position La position de la planète.
    * @param $size La taille de la planète.
    * @param $id_solar_system L'identifiant du système solaire dans lequel se trouve la planète.
    * @param $id_empire L'identifiant de l'empire contrôlant la planète (peut être null).
    */
    public function setPlanet($name, $position, $size, $id_solar_system, $id_empire){
        $sql = "INSERT into planets(name, position, size, id_solar_system, id_empire) VALUES (?, ?, ?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $position, $size, $id_solar_system, $id_empire]);
    }

    /**
    * @fn updatePlanetOwner($id_empire, $id_planet)
    * @brief Mettre a jour le propriétaire de la planète.
    * @param $id_empire L'identifiant de l'empire.
    * @param $id_planet L'identifiant de la planète.
    */
    public function updatePlanetOwner($id_empire, $id){
        $sql = "UPDATE planets SET id_empire = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_empire, $id]);
    }

    /**
    * @fn getPlanetsOwned($id_empire)
    * @brief Obtenir les planètes possédées par un empire.
    * @param $id_empire L'identifiant de l'empire.
    * @return $result Tableau des planètes possédées par l'empire ou false si aucune planète n'est possédée.
    */
    public function getPlanetsOwned($id_empire){
        $sql = "SELECT * FROM planets WHERE id_empire = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_empire]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @fn getRandomPlanet($id_solar_system)
    * @brief Récupérer une planète aléatoire dans un système solaire.
    * @param $id_solar_system L'identifiant du système solaire.
    * @return $result L'identifiant de la planète aléatoire ou false si aucune planète n'a été trouvée.
    */
    public function getRandomPlanet($id_solar_system){
        $sql = "SELECT id FROM planets WHERE id_solar_system = ? ORDER BY RAND() LIMIT 1";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_solar_system]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @brief Mettre à jour le nom de la planète.
    * @param $name Le nouveau nom de la planète.
    * @param $id_planet L'identifiant de la planète.
    */
    public function updatePlanetName($name, $id_planet){
        $sql = "UPDATE planets SET name = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $id_planet]);
    }

    /**
    * @fn getPlanetSize($id_planet)
    * @brief Obtenir la taille de la planète. Elle est utilisée pour calculer le nombre d'infrastructures qui peuvent être construites sur une planète.
    * @param $id_planet
    * @return $result Taille de la planète ou false si non trouvée.
    */
    public function getPlanetSize($id){
        $sql = "SELECT size FROM planets WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * @fn getPlanetOwner($id)
     * @brief Obtenir le propriétaire de la planète.
     * @param $id L'identifiant de la planète.
     * @return $result L'identifiant de l'empire propriétaire de la planète ou false si non trouvé.
     */
    public function getPlanetOwner($id){
        $sql = "SELECT id_empire FROM planets WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchColumn();
        return $result;
    }

    /**
     * @fn getPlanetsCount($id_solar_system)
     * @brief Obtenir le nombre de planètes dans un système solaire.
     * @param $id L'identifiant du système solaire.
     * @return $result Le nombre de planètes dans le système solaire ou false si non trouvé.
     */
    public function getPlanetsCount($id_solar_system){
        $sql = "SELECT COUNT(*) FROM planets WHERE id_solar_system = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_solar_system]);
        $result = $query->fetchColumn();
        return $result;
    }

    /**
     * @fn getAllPlanets($id_solar_system)
     * @brief Obtenir toutes les planètes d'un système solaire.
     * @param $id_solar_system L'identifiant du système solaire.
     * @return $result Un tableau d'objets planète ou false si non trouvé.
     */
    public function getAllPlanets($id_solar_system){
        $sql = "SELECT * FROM planets WHERE id_solar_system = ? ORDER BY position ASC";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_solar_system]);
        $result = $query->fetchAll();
        return $result;
    }
}
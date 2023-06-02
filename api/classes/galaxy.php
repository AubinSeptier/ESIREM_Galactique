<?php
/**
 * @file galaxy.php
 * @details Ce fichier contient la classe Galaxy qui est utilisée pour gérer les galaxies.
 */
include_once("database.php");

/**
 * @class Galaxy
 * @brief Classe permettant de gérer les galaxies.
 */
class Galaxy extends Database {
        
    /**
    * @fn getGalaxy($name)
    * @brief Obtenir des informations sur une galaxie à partir de son nom.
    * @param $name Le nom de la galaxie à récupérer.
    * @return $result Un tableau de données sur la galaxie ou false si aucune donnée n'a été trouvée.
    */
    public function getGalaxy($name){
        $sql = "SELECT * FROM galaxies WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
    * @fn setGalaxy($name, $id_universe)
    * @brief Ajouter une galaxie à la base de données.
    * @param $name Le nom de la galaxie.
    * @param $id_universe L'identifiant de l'univers auquel la galaxie appartient.
    */
    public function setGalaxy($name, $id_universe){
        $sql = "INSERT into galaxies(name, id_universe) VALUES (?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $id_universe]);
    }

    /**
    * @fn getRandomGalaxy($id_universe)
    * @brief Obtenir une galaxie aléatoire pour un univers donné. 
    * @param $id_universe L'identifiant de l'univers.
    * @return $result L'identifiant de la galaxie aléatoire ou false si aucune galaxie n'a été trouvée.
    */
    public function getRandomGalaxy($id_universe){
        $sql = "SELECT id FROM galaxies WHERE id_universe = ? ORDER BY RAND() LIMIT 1";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_universe]);
        $result = $query->fetchColumn();
        return $result;
    }

    /**
    * @fn getAllGalaxies($id_universe)
    * @brief Obtenir toutes les galaxies d'un univers.
    * @param $id_universe L'identifiant de l'univers.
    * @return $result Un tableau de données sur les galaxies ou false si aucune galaxie n'a été trouvée.
    */
    public function getAllGalaxies($id_universe){
        $sql = "SELECT * FROM galaxies WHERE id_universe = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_universe]);
        $result = $query->fetchAll();
        return $result;
    }
}
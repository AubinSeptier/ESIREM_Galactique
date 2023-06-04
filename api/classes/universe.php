<?php
/**
 * @file universe.php
 * @details Ce fichier contient la classe Universe qui permet de gérer les univers.
 */
include_once("database.php");

/**
 * @class Universe
 * @brief Classe permettant de gérer les univers.
 */
class Universe extends Database {
        
    /**
    * @fn getUniverseByName($name)
    * @brief Obtenir l'univers par le nom donné.
    * @param $name Le nom de l'univers à récupérer.
    * @return $result Un tableau d'objets univers ou false s'il n'y a pas d'univers avec le nom donné.
    */
    public function getUniverseByName($name){
        $sql = "SELECT * FROM universes WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
    * @fn setUnivers($name)
    * @brief Ajouter un univers à la base de données.
    * @param $name Le nom de l'univers à ajouter.
    */
    public function setUniverse($name){
        $sql = "INSERT into universes(name) VALUES (?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
    }
    
    /**
    * @fn getUniverseById($id)
    * @brief Obtenir l'univers par son identifiant.
    * @param $id L'identifiant de l'univers à récupérer.
    */
    public function getUniverseById($id){
        $sql = "SELECT * FROM universes WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @fn getAllUniverses()
    * @brief Obtenir tous les univers.
    * @return $result Un tableau d'objets univers.
    */
    public function getAllUniverses(){
        $sql = "SELECT * FROM universes";
        $query = $this->connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
<?php
/**
 * @file solar_system.php
 * @details Ce fichier contient la classe Solar_System qui est utilisée pour gérer les systèmes solaires.
 */
include_once("database.php");

/**
 * @class Solar_System
 * @brief Classe permettant de gérer les systèmes solaires.
 */
class Solar_System extends Database {
    
    /**
    * @fn getSolar_System($name)
    * @brief Obtenir des informations sur un système solaire à partir de son nom.
    * @param $name Le nom du système solaire à récupérer.
    * @return $result Un tableau de données sur le système solaire ou false si aucune donnée n'a été trouvée.
    */
    public function getSolar_System($name){
        $sql = "SELECT * FROM solar_systems WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    /**
    * @fn setSolar_System($name, $id_galaxy)
    * @brief Ajouter un système solaire à la base de données.
    * @param $name Le nom du système solaire.
    * @param $id_universe L'identifiant de la galaxie auquel le système solaire appartient.
    */
    public function setSolar_System($name, $planets_number, $id_galaxy){
        $sql = "INSERT into solar_systems(name, planets_number, id_galaxy) VALUES (?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $planets_number, $id_galaxy]);
    }

    /**
    * @fn getRandomSolar_System($id_galaxy)
    * @brief Obtenir un système solaire aléatoire pour une galaxie donnée. 
    * @param $id_universe L'identifiant de la galaxie.
    * @return $result L'identifiant du système solaire aléatoire ou false si aucun système solaire n'a été trouvé.
    */
    public function getRandomSolar_System($id_galaxy){
        $sql = "SELECT id FROM solar_systems WHERE id_galaxy = ? ORDER BY RAND() LIMIT 1";
        $query = $this->connect()->prepare($sql);
        $query->execute([$id_galaxy]);
        $result = $query->fetchColumn();
        return $result;
    }
}
<?php
/**
 * @file research.php
 * @details Ce fichier contient la classe Research qui est utilisée pour gérer les recherches.
 */
include_once 'database.php';

// To complete

/**
 * @class Research
 * @brief Classe permettant de gérer les recherches.
 */
class Research extends Database {

    public function getResearch($name){
        $sql = "SELECT * FROM researches WHERE name = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name]);
        $result = $query->fetchAll();
        return $result;
    }

    public function setResearch($name, $empire){
        $sql = "INSERT into researches(name, empire) VALUES (?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([$name, $empire]);
    }
}
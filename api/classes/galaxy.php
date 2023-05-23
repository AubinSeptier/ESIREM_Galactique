<?php
include_once("database.php");

class Galaxy extends Database {
        
        public function getGalaxy($name){
            $sql = "SELECT * FROM galaxies WHERE name = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name]);
            $result = $query->fetchAll();
            return $result;
        }
    
        public function setGalaxy($id, $name, $id_universe){
            $sql = "INSERT into galaxies(id, name, id_universe) VALUES (?, ?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$id, $name, $id_universe]);
        }
}
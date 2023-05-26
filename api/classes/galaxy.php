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
    
        public function setGalaxy($name, $id_universe){
            $sql = "INSERT into galaxies(name, id_universe) VALUES (?, ?)";
            $query = $this->connect()->prepare($sql);
            $query->execute([$name, $id_universe]);
        }

        public function getRandomGalaxy($id_universe){
            $sql = "SELECT * FROM galaxies WHERE id_universe = ? ORDER BY RAND() LIMIT 1";
            $query = $this->connect()->prepare($sql);
            $query->execute([$id_universe]);
            $result = $query->fetchAll();
            return $result;
        }
}
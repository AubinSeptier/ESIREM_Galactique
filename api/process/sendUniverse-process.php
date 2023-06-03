<?php
session_start();
include_once("../classes/universe.php");

$universe = new Universe();

$allUniverses = $universe->getAllUniverses();
$data = array(
    "allUniverses" => $allUniverses
);

echo json_encode($data);


<?php
session_start();

if(isset($_POST["disconnectUniverse_button"])){
    unset($_SESSION["empireId"]);
    unset($_SESSION["universeId"]);
    header("Location:http://localhost/ESIREM_Galactique/front/player.php");
}
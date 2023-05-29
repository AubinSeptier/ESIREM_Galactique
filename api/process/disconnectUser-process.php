<?php
session_start();
include_once("../classes/user.php");

if(isset($_POST["disconnectUser_button"])){
    session_destroy();
    header("Location:http://localhost/ESIREM_Galactique/front/login.php");
}
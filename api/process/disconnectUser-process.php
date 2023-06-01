<?php
session_start();
include_once("../classes/user.php");

if(isset($_POST["disconnectUser_button"])){
    session_destroy();
    echo json_encode(array("status" => "success"));
}
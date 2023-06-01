<?php
session_start();
include_once("../classes/user.php");

session_destroy();
echo json_encode(array("status" => "success"));

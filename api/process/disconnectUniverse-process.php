<?php
session_start();

unset($_SESSION["empireId"]);
unset($_SESSION["universeId"]);
echo json_encode(array("status" => "success"));
<?php
/**
 * @file disconnectUser-process.php
 * Fichier contient le système complet de déconnexion d'un utilisateur.
 * 
 * @page disconnectUser disconnectUser-process.php
 * 
 * Cette fonction réalise le processus de déconnexion d'un utilisateur en utilisant la superglobale $_SESSION.
 * Elle supprime toutes les variables de session.
 * 
 * La fonction effectue les étapes suivantes :
 * - Supprime toutes les variables de session.
 * - Retourne un message de succès.
 */
session_start();
include_once("../classes/user.php");

session_destroy();
echo json_encode(array("status" => "success"));

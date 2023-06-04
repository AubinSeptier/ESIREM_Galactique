<?php
/**
 * @file disconnectUniverse-process.php
 * Fichier contient le système complet de déconnexion d'univers.
 * 
 * @page disconnectUniverse disconnectUniverse-process.php
 * 
 * Cette fonction réalise le processus de déconnexion d'univers en utilisant la superglobale $_SESSION.
 * Elle supprime les variables de session relatives à l'univers.
 * 
 * La fonction effectue les étapes suivantes :
 * - Supprime les variables de session relatives à l'univers.
 * - Retourne un message de succès.
 * 
 */
session_start();

unset($_SESSION["empireId"]);
unset($_SESSION["universeId"]);
echo json_encode(array("status" => "success"));
<?php
/*session_start();
if (!isset($_SESSION['empireId']) && !isset($_SESSION['universeId'])) {
	header('Location: ./player.php');
	exit();
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Infrastructure - ESIGalactique</title>
    <link rel="stylesheet" href="./css/infrastructures.css">
</head>
<body>
    <header>
        <h1>ESIGalactique</h1>
        <div class="empire-data">
            <p>Empire : <span id="empireName"></span></p>
            <p>Deutérium : <span id="empireDeuterium" style="display: inline;"></span> Énergie : <span id="empireEnergy" style="display: inline;"></span> Énergie utilisée : <span id="empireEnergyUsed" style="display: inline;"></span> Métal : <span id="empireMetal" style="display: inline;"></span></p>
        </div>
		<a class="logoutUniverse-button">Déconnexion</a>
    </header>
    <nav>
        <ul>
			<li><a href="./index.php">Accueil</a></li>
			<li><a href="./galaxie.php">Galaxie</a></li>
			<li><a href="./flotte.php">Flotte</a></li>
			<li class="active"><a href="./infrastructures.php">Infrastructures</a></li>
			<li><a href="./recherche.php">Recherche</a></li>
			<li><a href="./chantierSpatial.php">Chantier Spatial</a></li>
        </ul>
    </nav>
    <section>
        <div class="left-section">
            <div class="dropdown">
                <select name="galaxie" required>
                    <option value="" disabled selected>Galaxie</option>
                    <!-- Options pour la sélection des galaxies -->
                </select>
            </div>
            <div class="dropdown">
                <select name="systeme_solaire" required>
                    <option value="" disabled selected>Système solaire</option>
                    <!-- Options pour la sélection des systèmes solaires -->
                </select>
            </div>
            <div class="dropdown">
                <select name="planete" required>
                    <option value="" disabled selected>Planète</option>
                    <!-- Options pour la sélection des planètes -->
                </select>
            </div>
            <li>
                <button class="upgrade-button" onclick="redirectToUpgrade()">Aller aux améliorations</button>
            </li>
        </div>
        <div class="right-section">
            <div class="infrastructure">
                <h3>labo de recherche</h3>
                <p>Coût en métal: 1000</p>
                <p>Coût en énergie: 500</p>
                <p>Coût en deuterium: 0</p>
                <p>Temps de construction: 50s</p>
                <a href="#" class="createLab">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>chantier spatial </h3>
                <p>Coût en métal: 500</p>
                <p>Coût en énergie: 500</p>
                <p>Coût en deuterium: 0</p>
                <p>Temps de construction: 50s</p>
                <a href="#" class="createChantier">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>usine de nanites</h3>
                <p>Coût en métal: 10000</p>
                <p>Coût en énergie: 5000</p>
                <p>Coût en deuterium: 0</p>
                <p>Temps de construction: 10m</p>
                <a href="#" class="createUsine">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>mine de métal</h3>
                <p>Coût en métal: 100</p>
                <p>Coût en énergie: 10</p>
                <p>Coût en deuterium: 0</p>
                <p>Temps de construction: 10s</p>
                <a href="#" class="createMine">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>centrale solaire</h3>
                <p>Coût en métal: 150</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deuterium: 20</p>
                <p>Temps de construction: 10s</p>
                <a href="#" class="createCentraleS">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>centrale à fusion</h3>
                <p>Coût en métal: 5000</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deuterium: 2000</p>
                <p>Temps de construction: 2m</p>
                <a href="#" class="createCentraleF">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>artillerie laser</h3>
                <p>Coût en métal: 1500</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deuterium: 300</p>
                <p>Temps de construction: 10s</p>
                <a href="#" class="createLaser">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>canon à ions</h3>
                <p>Coût en métal: 5000</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deuterium: 1000</p>
                <p>Temps de construction: 40s</p>
                <a href="#" class="createCanon">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>bouclier</h3>
                <p>Coût en métal: 10000</p>
                <p>Coût en énergie: 1000</p>
                <p>Coût en deuterium: 5000</p>
                <p>Temps de construction: 60s</p>
                <a href="#" class="createBouclier">Créer</a>
            </div>
			<div class="infrastructure">
                <h3>synthétiseur de deutérium</h3>
                <p>Coût en métal: 200</p>
                <p>Coût en énergie: 50</p>
                <p>Coût en deuterium: 0</p>
                <p>Temps de construction: 25s</p>
                <a href="#" class="createSynthe">Créer</a>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
    </footer>
	<script src="./js/logoutUniverse.js"></script>
    <script src="./js/create_infrastructures.js"></script>
    <script src="./js/goToUpgrades.js"></script>
    <script src="./js/getRessources.js"></script>
</body>
</html>


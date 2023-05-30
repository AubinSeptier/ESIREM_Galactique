<?php
session_start();
if (!isset($_SESSION['empireId']) && !isset($_SESSION['universeId'])) {
	header('Location: ./player.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ESI Galactique</title>
	
    <link rel="stylesheet" href=".\css\style.css">
	<script src="./logout.js"></script>

</head>
<body>
	<header>
		<h1>ESI Galactique</h1>
		<a class="logout-button" href="./logout.php">Déconnexion</a>
	</header>
	<nav>
		<ul>
			<li class="active"><a href="./index.php">Accueil</a></li>
			<li><a href="./galaxie.php">Galaxie</a></li>
			<li><a href="./flotte.php">Flotte</a></li>
			<li><a href="./infrastructures.php">Infrastructures</a></li>
			<li><a href="./recherche.php">Recherche</a></li>
			<li><a href="./chantierSpatial.php">Chantier Spatial</a></li>
			<li><a href="./player.php">player</a></li>

		</ul>
		<form action="#" method="get">
			<input type="text" name="search" placeholder="Recherche...">
			<button type="submit">Ok</button>
		</form>
	</nav>
	<section>
		<div>
			<h2>Galaxie</h2>
			<p>Vous possédez 3 planètes.</p>
			<p>Planète principale : XYZ
            <p>Température : 25°C</p>
            <p>Productions : Métal 10/h - Cristal 5/h - Deutérium 2/h</p>
            <p><a class="lien" href="./Galaxie.php">Voir les galaxies</a></p>
        </div>
            <div>
                <h2>Flotte</h2>
                <p>Vous possédez 10 Chasseurs légers, 5 Croiseurs, 2 Bombardiers et 1 Vaisseau de colonisation.</p>
                <p><a class="lien" href="./flotte.php">Voir la flotte</a></p>
            </div>
            <div>
                <h2>Infrastructures</h2>
                <p>Usine de Robots : Niveau 5</p>
                <p>Chantier spatial : Niveau 3</p>
                <p>Centrale électrique solaire : Niveau 7</p>
                <p><a class="lien" href="#">Voir les bâtiments</a></p>
            </div>
			<div>
				<h2>Recherche</h2>
				<p>Vous possédez 3 planètes.</p>
				<p>Planète principale : XYZ
				<p>Température : 25°C</p>
				<p>Productions : Métal 10/h - Cristal 5/h - Deutérium 2/h</p>
				<p><a class="lien" href="./Galaxie.php">Voir les galaxies</a></p>
			</div>
			<div>
				<h2>Chantier Spatial</h2>
				<p>Vous possédez 3 planètes.</p>
				<p>Planète principale : XYZ
				<p>Température : 25°C</p>
				<p>Productions : Métal 10/h - Cristal 5/h - Deutérium 2/h</p>
				<p><a class="lien" href="./Galaxie.php">Voir les galaxies</a></p>
			</div>
        </section>
        <footer>
            <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
        </footer>
    </body>
    </html>
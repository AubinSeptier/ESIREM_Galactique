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
	<title>Galaxie - ESI Galactique</title>
    <link rel="stylesheet" href="./css/galaxie.css">
</head>
<body>
	<header>
		<h1>ESI Galactique</h1>
	</header>
	<nav>
		<ul>
			<li><a href="./index.php">Accueil</a></li>
			<li class="active"><a href="./galaxie.php">Galaxie</a></li>
			<li><a href="./flotte.php">Flotte</a></li>
			<li><a href="./infrastructures.php">Infrastructures</a></li>
			<li><a href="./recherche.php">Recherche</a></li>
			<li><a href="./chantierSpatial.php">Chantier Spatial</a></li>
		</ul>
		<form action="#" method="get">
			<input type="text" name="search" placeholder="Recherche...">
			<button type="submit">Ok</button>
		</form>
	</nav>
	<section>
		<div>
			<h2>Galaxie</h2>
			<p>Bienvenue dans la galaxie d'ESI Galactique. Explorez les différentes planètes et découvrez de nouvelles civilisations.</p>
			<p><a class="lien" href="#">Voir la galaxie</a></p>
		</div>
	</section>
	<footer>
		<p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
	</footer>
</body>
</html>
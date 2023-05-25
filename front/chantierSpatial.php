<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: ./login.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chantier Spatial - ESI Galactique</title>
    <link rel="stylesheet" href="./css/ChantierSpatial.css">
</head>
<body>
	<header>
		<h1>ESI Galactique</h1>
	</header>
	<nav>
	<ul>
			<li><a href="./index.php">Accueil</a></li>
			<li><a href="./galaxie.php">Galaxie</a></li>
			<li><a href="./flotte.php">Flotte</a></li>
			<li><a href="./infrastructures.php">Infrastructures</a></li>
			<li><a href="./recherche.php">Recherche</a></li>
			<li class="active"><a href="./chantierSpatial.php">Chantier Spatial</a></li>
		</ul>
		<form action="#" method="get">
			<input type="text" name="search" placeholder="Recherche...">
			<button type="submit">Ok</button>
		</form>
	</nav>
	<section>
		<div>
			<h2>Chantier Spatial</h2>
			<p>Construisez de puissants vaisseaux pour étendre votre domination dans la galaxie.</p>
			<p><a class="lien" href="#">Gérer le chantier spatial</a></p>
		</div>
	</section>
	<footer>
		<p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
	</footer>
</body>
</html>
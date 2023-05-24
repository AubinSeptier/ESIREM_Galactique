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
	<title>Recherche - ESI Galactique</title>
    <link rel="stylesheet" href="./css/Recherche.css">
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
			<li class="active"><a href="./recherche.php">Recherche</a></li>
			<li><a href="./chantierSpatial.php">Chantier Spatial</a></li>
		</ul>
		<form action="#" method="get">
			<input type="text" name="search" placeholder="Recherche...">
			<button type="submit">Ok</button>
		</form>
	</nav>
	<section>
		<div>
			<h2>Recherche</h2>
			<p>Améliorez vos connaissances scientifiques pour débloquer de nouvelles technologies et renforcer votre empire.</p>
			<p><a class="lien" href="#">Gérer les recherches</a></p>
		</div>
	</section>
	<footer>
		<p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
	</footer>
</body>
</html>
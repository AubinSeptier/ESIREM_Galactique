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
	<title>Infrastructure - ESI Galactique</title>
    <link rel="stylesheet" href="./css/Infrastructures.css">
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
			<h2>Infrastructure</h2>
			<p>Gérez les constructions et les améliorations de vos bâtiments pour développer votre empire galactique.</p>
			<p><a class="lien" href="#">Gérer l'infrastructure</a></p>
		</div>
	</section>
	<footer>
		<p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
	</footer>
</body>
</html>
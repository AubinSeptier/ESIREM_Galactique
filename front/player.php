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
    <title>Choix de l'univers - ESIGalactique</title>
    <link rel="stylesheet" href="./css/player.css">
</head>
<body>
    <header>
        <h1>ESIGalactique</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li class="active"><a href="choix-univers.html">Choix de l'univers</a></li>
            <li><a href="profil.html">Profil</a></li>
            <li><a href="classement.html">Classement</a></li>
            <li><a href="parametres.html">Paramètres</a></li>
        </ul>
    </nav>
    <section>
        <h2>Choix de l'univers</h2>
        <div class="univers">
            <h3>Univers 1</h3>
            <p>Description de l'univers 1.</p>
            <a href="#" class="button">Choisir</a>
        </div>
        <div class="univers">
            <h3>Univers 2</h3>
            <p>Description de l'univers 2.</p>
            <a href="#" class="button">Choisir</a>
        </div>
        <div class="univers">
            <h3>Univers 3</h3>
            <p>Description de l'univers 3.</p>
            <a href="#" class="button">Choisir</a>
        </div>
    </section>
    <footer>
        <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
    </footer>
</body>
</html>
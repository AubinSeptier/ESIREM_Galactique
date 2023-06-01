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
        <a class="logoutUser-button">Déconnexion</a>
    </header>
    <nav>
        <ul>
            <li><a href="./index.php">Accueil</a></li>
            <li class="active"><a href="choix-univers.html">Choix de l'univers</a></li>
            <li><a href="./profil.html">Profil</a></li>
            <li><a href="./classement.html">Classement</a></li>
            <li><a href="./parametres.html">Paramètres</a></li>
        </ul>
    </nav>
    <section>
        <h2>Choix de l'univers</h2>
        <div class="univers">
            <h3>Créer un nouvel univers</h3>
            <form>
                <input type="text" name="universeName" placeholder="Nom de l'univers" required>
                <a href="./" class="button">Créer</a>
            </form>
        </div>
        <div class="univers">
            <h3>Se connecter à un univers existant</h3>
            <form>
                <select name="univers" required>
                    <option value="" disabled selected>Choisir un univers</option>
                    <option value="univers1">Univers 1</option>
                    <option value="univers2">Univers 2</option>
                    <option value="univers3">Univers 3</option>
                </select>
                <a href="#" class="button">Se connecter</a>
            </form>
        </div>
    </section>
    <footer>
        <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
    </footer>
    <script src="./js/create_universe.js"></script>
</body>
</html>

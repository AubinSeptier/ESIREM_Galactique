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
    <title>Créer un empire - ESIGalactique</title>
    <link rel="stylesheet" href="./css/empire.css">
</head>
<body>
    <header>
        <h1>ESIGalactique</h1>
    </header>
    <div class="container">
        <h2>Créer un empire</h2>
        <form id="empireForm">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="race">Race :</label>
                <input type="text" id="race" name="race" required>
            </div>
            <div class="form-group">
                <label for="adjectif">Adjectif :</label>
                <input type="text" id="adjectif" name="adjectif" required>
            </div>
            <button type="submit">Créer un empire</button>
        </form>
    </div>
    <footer class="footer">
        <a href="https://www.twitch.tv/lesmoulinsdudev">
            <img src="./ressources/Image1.png" alt="Logo" />
        </a>    
    <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
    </footer>
    <script src="./js/empire.js"></script>
</body>
</html>

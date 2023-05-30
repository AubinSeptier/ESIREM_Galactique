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
                <label for="adjective">Adjectif :</label>
                <input type="text" id="adjective" name="adjective" required>
            </div>
            <button type="submit">Créer un empire</button>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
    </footer>
    <script src="./js/empire.js"></script>
</body>
</html>

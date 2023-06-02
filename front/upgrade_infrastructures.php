<!DOCTYPE html>
<html>
<head>
    <title>Upgrades Infrastructures - ESIGalactique</title>
    <link rel="stylesheet" href="./css/upgrade_infrastructures.css">
</head>
<body>
    <header>
        <h1>ESIGalactique</h1>
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
            <div class="dropdown">
                <select name="infrastructure" required>
                    <option value="" disabled selected>Choisir une infrastructure</option>
                    <option value="labo_recherche">Labo de recherche</option>
                    <option value="chantier_spatial">Chantier spatial</option>
                    <option value="usine_nanites">Usine de nanites</option>
                    <option value="mine_metal">Mine de métal</option>
                    <option value="centrale_solaire">Centrale solaire</option>
                    <option value="centrale_fusion">Centrale à fusion</option>
                    <option value="artillerie_laser">Artillerie laser</option>
                    <option value="canon_ions">Canon à ions</option>
                    <option value="bouclier">Bouclier</option>
                    <option value="synthetiseur_deuterium">Synthétiseur de deutérium</option>
                </select>
            </div>
            <button class="upgrade-button" onclick="redirectToUpgrade()">Retourner aux créations</button>
        </div>
        <div class="right-section">
            <div id="selected-infrastructure">
                <h3>Infrastructure sélectionnée</h3>
                <p>Aucune infrastructure sélectionnée</p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
    </footer>
    <script src="./js/logoutUniverse.js"></script>
    <script src="./js/upgrade_infrastructures.js"></script>
</body>
</html>

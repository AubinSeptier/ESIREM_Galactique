<!DOCTYPE html>
<html>
<head>
    <title>Recherche - ESI Galactique</title>
    <link rel="stylesheet" href="./css/recherche.css">
</head>
<body>
    <header>
        <h1>ESI Galactique</h1>
        <div class="empire-data">
            <p>Empire : <span id="empireName"></span></p>
            <p>Deutérium : <span id="empireDeuterium"></span></p>
            <p>Énergie : <span id="empireEnergy"></span></p>
            <p>Énergie utilisée : <span id="empireEnergyUsed"></span></p>
            <p>Métal : <span id="empireMetal"></span></p>
        </div>
        <a class="logoutUniverse-button">Déconnexion</a>
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
        <div class="technologies">
            <div class="technology">
                <h3>Technologie ENERGIE</h3>
                <p>Coût en métal: 0</p>
                <p>Coût en énergie: 00</p>
                <p>Coût en deutérium: 100</p>
                <p>Temps de recherche: 4s</p>
                <p>Requiert l'infrastructure "Laboratoire de recherche". Chaque niveau de la technologie augmente la production d'énergie des centrales de 2%.</p>
                <a href="#" class="research-energy">Rechercher</a>
            </div>
            <div class="technology">
                <h3>Technologie LASER</h3>
                <p>Coût en métal: 0</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deutérium: 300</p>
                <p>Temps de recherche: 2s</p>
                <p>Requiert l'infrastructure "Laboratoire de recherche". Requiert la technologie "ENERGIE" niveau 5.  </p>
                <a href="#" class="research-laser">Rechercher</a>
            </div>
            <div class="technology">
                <h3>Technologie IONS</h3>
                <p>Coût en métal: 0</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deutérium: 500</p>
                <p>Temps de recherche: 8s</p>
                <p>Requiert l'infrastructure "Laboratoire de recherche". Requiert la technologie "LASER" niveau 5.</p>
                <a href="#" class="research-ions">Rechercher</a>
            </div>
            <div class="technology">
                <h3>Technologie BOUCLIER</h3>
                <p>Coût en métal: 0</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deutérium: 1000</p>
                <p>Temps de recherche: 5s</p>
                <p>Requiert l'infrastructure "Laboratoire de recherche". Requiert la technologie "ENERGIE" niveau 8. Requiert la technologie "IONS" niveau 2. Chaque niveau de la technologie augmente les points de défense des systèmes de défense et des vaisseaux de 5%.</p>
                <a href="#" class="research-shield">Rechercher</a>
            </div>
            <div class="technology">
                <h3>Technologie ARMEMENT</h3>
                <p>Coût en métal: 500</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deutérium: 200</p>
                <p>Temps de recherche: 6s</p>
                <p>Requiert l'infrastructure "Laboratoire de recherche". Chaque niveau de la technologie augmente l'attaque des systèmes de défense et des vaisseaux de 3%.</p>
                <a href="#" class="research-armament">Rechercher</a>
            </div>
			<div class="technology">
                <h3>Technologie IA</h3>
                <p>Coût en métal: 500</p>
                <p>Coût en énergie: 0</p>
                <p>Coût en deutérium: 200</p>
                <p>Temps de recherche: 6s</p>
                <p>Requiert l'infrastructure "Laboratoire de recherche". Chaque niveau de la technologie augmente l'attaque des systèmes de défense et des vaisseaux de 3%.</p>
                <a href="#" class="research-armament">Rechercher</a>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; ESI Galactique 2023 - Tous droits réservés</p>
    </footer>
    <script src="./js/logoutUniverse.js"></script>
    <script src="./js/getRessources.js"></script>
	<script src="./js/recherche.js"></script>

</body>
</html>

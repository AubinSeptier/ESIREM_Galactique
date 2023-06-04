# ESIREM Galactique

ESIREM Galactique est un projet de développement web réalisé dans le cadre de notre troisième année à l'ESIREM. Il vise à créer un jeu en ligne où l'on peut contrôler son propre empire et le faire conquérir la galaxie !
Notre projet est fait à partir des langages HTML, CSS, JavaScript et PHP et utilise une base de données SQL.

## Auteurs

Le projet a été réalisé par:
- [Aubin SEPTIER](https://github.com/AubinSeptier)
- [Maxence CONTANT](https://github.com/Maxencec21)

## Organisation du projet

Le projet est organisé de la manière suivante :

- **/api** : ce répertoire contient le code source de notre api en PHP permettant de récupérer et de modifier les données de notre base de données SQL.
- **/doc** : ce répertoire contient l'intégralité de la documentation de notre API générée à l'aide de Doxygen
- **/front** : ce répertoire contient le code source en HTML, CSS et JavaScript de notre interface web et de nos scripts interagissant entre le frontend et le backend.

## Modèles de la Base de données

Notre modèle entités-relations est disponible au format PNG et au format drawio dans le dossier *doc* de notre projet.  
Notre modèle relationnel pour notre base de données est actuellement le suivant (clé primaire en **gras** et clé étrangère en *italique*) :    
- empires(**id**, name, race, adjective, deuterium_stock, energy_stock, energy_stock_used, metal_stock, *id_universe*, *id_user*)  
- fleets(**id**, name, ships_number, attack, defense, *id_empire*, *id_planet*)  
- galaxies(**id**, name, *id_universe*)  
- infrastructures(**id**, name, level, upgrade_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense, *id_planet*, *id_infrastructure_type*)  
- infrastructure_types(**id**, name, building_time, deuterium_cost, energy_cost, metal_cost, deuterium_production, energy_production, metal_production, attack, defense)  
- planets(**id**, name, position, size, *id_solar_system*, *id_empire*)  
- researches(**id**, name, level, research_time, deuterium_cost, metal_cost, *id_research_type*, *id_empire*)  
- research_types(**id**, name, research_time, deuterium_cost, metal_cost)  
- resources(**id**, deuterium, energy, metal, *id_planet*)  
- ships(**id**, name, attack, defense, capacity, *id_fleet*, *id_ship_type*)  
- ship_types(**id**, name, deuterium_number, metal_number, building_time, attack, defense, capacity)  
- solar_systems(**id**, name, planets_number, *id_galaxy*)
- universes(**id**, name)  
- users(**id**, email, username, password)  

## Architecture du code

L'architecture du code suit le modèle suivant:  
├── /api  
│ ├── /classes  
│ ├── /process  
├── /doc  
│ ├── /html  
├── /front  
│ ├── /css  
│ ├── /js  
│ ├── /ressources  


- Le répertoire `/api` contient les classes et les processus liés à notre api. `/classes` contient nos classes PHP et `/process`les différents scripts PHP permettant de réaliser les différentes tâches liées à notre base de données et au gameplay.
- Le répertoire `/doc` contient la documentation du projet, y compris les fichiers HTML générés.
- Le répertoire `/front` contient les fichiers HTML, de style CSS, les scripts JavaScript et les ressources (images, fichiers multimédias, etc.) utilisés par l'interface utilisateur. `/css` contient nos fichiers CSS permettant un affichage et un design spécifique pour notre jeu. 
`js`contient nos différents fichiers JavaScript permettant de lier le frontend au backend. `ressources` contient les quelques images et fichiers multimédias dont nous avons besoins. 

## Choses possibles et non possibles actuellement  

Actuellement les choses suivantes sont faisables depuis l'interface utilisateur:  
- Se créer un compte
- Se connecter à un compte existant
- Créer un univers
- Rejoindre un univers existant
- Créer un empire
- Voir les ressources possédées par son empire
- Construire des infrastructures (sur une planète par défaut défini dans le JS)
- Effectuer les différentes recherches technologiques
- Rechercher des technologies
- Se déconnecter d'un univers
- Se déconnecter du jeu complet

A partir du php et de l'exécution brut des process, il est possible de faire certaines choses non faisables depuis l'interface :  
- Créer des vaisseaux
- Renommer une planète
- Améliorer des infrastructures (sans bonus, ni changement hors coûts en ressources et niveaux)





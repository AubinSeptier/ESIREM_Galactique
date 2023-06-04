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
- Rechercher des technologies
- Se déconnecter d'un univers
- Se déconnecter du jeu complet

A partir du php et de l'exécution brut des process, il est possible de faire certaines choses non faisables depuis l'interface :  
- Créer des vaisseaux
- Renommer une planète
- Améliorer des infrastructures (sans bonus, ni changement hors coûts en ressources et niveaux)


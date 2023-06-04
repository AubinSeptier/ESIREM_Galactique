----- AUTHORS: Aubin SEPTIER / Maxence CONTANT -----
----- Base de données : `esi_galactique` -----

CREATE DATABASE `esi_galactique`;

USE `esi_galactique`;

--------------------------------------------------------
--------------------------------------------------------
--------------------------------------------------------

-- Table `empires`

CREATE TABLE `empires` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `race` VARCHAR(50) NOT NULL,
  `adjective` VARCHAR(50) NOT NULL,
  `deuterium_stock` INT NOT NULL,
  `energy_stock` INT NOT NULL,
  `energy_stock_used` INT NOT NULL,
  `metal_stock` INT NOT NULL,
  `id_universe` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id`)
);

-------------------------------------------------------- 

-- Structure de la table `fleets`

CREATE TABLE `fleets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `ships_number` INT NOT NULL,
  `attack` INT NOT NULL,
  `defense` INT NOT NULL,
  `id_empire` INT NOT NULL,
  `id_planet` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `galaxies`

CREATE TABLE `galaxies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `id_universe` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `infrastructures`

CREATE TABLE `infrastructures` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `level` INT NOT NULL,
  `upgrade_time` INT NOT NULL,
  `deuterium_cost` INT NOT NULL,
  `energy_cost` INT NOT NULL,
  `metal_cost` INT NOT NULL,
  `deuterium_production` INT NOT NULL,
  `energy_production` INT NOT NULL,
  `metal_production` INT NOT NULL,
  `attack` INT NOT NULL,
  `defense` INT NOT NULL,
  `id_planet` INT NOT NULL,
  `id_infrastructure_type` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `infrastructure_types`

CREATE TABLE `infrastructure_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `building_time` INT NOT NULL,
  `deuterium_cost` INT NOT NULL,
  `energy_cost` INT NOT NULL,
  `metal_cost` INT NOT NULL,
  `deuterium_production` INT NOT NULL,
  `energy_production` INT NOT NULL,
  `metal_production` INT NOT NULL,
  `attack` INT NOT NULL,
  `defense` INT NOT NULL,
  PRIMARY KEY (`id`)  
);

--------------------------------------------------------

-- Table `planets`

CREATE TABLE `planets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `position` INT NOT NULL,
  `size` INT NOT NULL,
  `id_solar_system` INT NOT NULL,
  `id_empire` INT DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `researches`

CREATE TABLE `researches` (
  `id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `level` INT NOT NULL,
  `research_time` INT NOT NULL,
  `deuterium_cost` INT NOT NULL,
  `metal_cost` INT NOT NULL,
  `id_research_type` INT NOT NULL,
  `id_empire` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `research_types`

CREATE TABLE `research_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `research_time` INT NOT NULL,
  `deuterium_cost` INT NOT NULL,
  `metal_cost` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `resources`

CREATE TABLE `resources` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `deuterium` INT NOT NULL,
  `energy` INT NOT NULL,
  `metal` INT NOT NULL,
  `id_planet` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `ships`

CREATE TABLE `ships` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `attack` INT NOT NULL,
  `defense` INT NOT NULL,
  `capacity` INT NOT NULL,
  `id_fleet` INT NOT NULL,
  `id_ship_type` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `ship_types`

CREATE TABLE `ship_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `deuterium_number` INT NOT NULL,
  `metal_number` INT NOT NULL,
  `building_time` INT NOT NULL,
  `attack` INT NOT NULL,
  `defense` INT NOT NULL,
  `capacity` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `solar_systems`

CREATE TABLE `solar_systems` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `planets_number` INT NOT NULL,
  `id_galaxy` INT NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Table `universes`

CREATE TABLE `universes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------

-- Structure de la table `users`

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

--------------------------------------------------------
--------------------------------------------------------
--------------------------------------------------------


--- Ajouts de données dans les tables `..._types` ---

-- Insertion des données dans la table `infrastructure_types`

INSERT INTO `infrastructure_types` (`id`, `name`, `building_time`, `deuterium_cost`, `energy_cost`, `metal_cost`, `deuterium_production`, `energy_production`, `metal_production`, `attack`, `defense`) VALUES
(1, 'research_lab', 50, 0, 500, 1000, 0, 0, 0, 0, 0),
(2, 'space_sit', 50, 0, 500, 500, 0, 0, 0, 0, 0),
(3, 'nanites_factory', 600, 0, 5000, 10000, 0, 0, 0, 0, 0),
(4, 'metal_mine', 10, 0, 10, 100, 0, 0, 3, 0, 0),
(5, 'deuterium_synthesizer', 25, 0, 50, 200, 1, 0, 0, 0, 0),
(6, 'solar_plant', 10, 20, 0, 150, 0, 20, 0, 0, 0),
(7, 'fusion_plant', 120, 2000, 0, 5000, 0, 0, 50, 0, 0),
(8, 'laser_artillery', 10, 300, 0, 1500, 0, 0, 0, 100, 25),
(9, 'ion_gun', 40, 1000, 0, 5000, 0, 0, 0, 250, 200),
(10, 'shield', 60, 5000, 1000, 10000, 0, 0, 0, 0, 2000);

--------------------------------------------------------

-- Insertion des données dans la table `research_types`

INSERT INTO `research_types` (`id`, `name`, `research_time`, `deuterium_cost`, `metal_cost`) VALUES
(1, 'energy', 4, 100, 0),
(2, 'laser', 2, 300, 0),
(3, 'ions', 8, 500, 0),
(4, 'shield', 5, 1000, 0),
(5, 'armament', 6, 200, 500),
(6, 'ai', 5, 100, 0);

--------------------------------------------------------

-- Insertion des données dans la table `ship_types`

INSERT INTO `ship_types` (`id`, `name`, `deuterium_number`, `metal_number`, `building_time`, `attack`, `defense`, `capacity`) VALUES
(1, 'fighter', 500, 3000, 20, 75, 50, 0),
(2, 'cruiser', 5000, 20000, 120, 400, 150, 0),
(3, 'transporter', 1500, 6000, 55, 0, 50, 100000),
(4, 'settler', 10000, 10000, 120, 0, 50, 0);


--------------------------------------------------------
--------------------------------------------------------
--------------------------------------------------------

--- Clés étrangères/Contraintes des tables ---

-- Clés étrangères/Contraintes de la table `empires`

ALTER TABLE `empires`
  ADD CONSTRAINT `fk_empires_universes_id` FOREIGN KEY (`id_universe`) REFERENCES `universes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empires_users_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `fleets`

ALTER TABLE `fleets`
  ADD CONSTRAINT `fk_fleets_empires_id` FOREIGN KEY (`id_empire`) REFERENCES `empires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kf_fleets_planets_id` FOREIGN KEY (`id_planet`) REFERENCES `planets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `galaxies`

ALTER TABLE `galaxies`
  ADD CONSTRAINT `fk_galaxies_universes_id` FOREIGN KEY (`id_universe`) REFERENCES `universes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `infrastructures`

ALTER TABLE `infrastructures`
  ADD CONSTRAINT `fk_infrastructures_infrastructures_type_id` FOREIGN KEY (`id_infrastructure_type`) REFERENCES `infrastructure_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_infrastructures_planets_id` FOREIGN KEY (`id_planet`) REFERENCES `planets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `planets`

ALTER TABLE `planets`
  ADD CONSTRAINT `fk_planets_empires_id` FOREIGN KEY (`id_empire`) REFERENCES `empires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_planets_solar_systems_id` FOREIGN KEY (`id_solar_system`) REFERENCES `solar_systems` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `researches`

ALTER TABLE `researches`
  ADD CONSTRAINT `fk_researches_empires_id` FOREIGN KEY (`id_empire`) REFERENCES `empires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_researches_research_types_id` FOREIGN KEY (`id_research_type`) REFERENCES `research_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `resources`

ALTER TABLE `resources`
  ADD CONSTRAINT `fk_resources_planets` FOREIGN KEY (`id_planet`) REFERENCES `planets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `ships`

ALTER TABLE `ships`
  ADD CONSTRAINT `fk_ships_fleets_id` FOREIGN KEY (`id_fleet`) REFERENCES `fleets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kf_ships_ships_types_id` FOREIGN KEY (`id_ship_type`) REFERENCES `ship_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Clés étrangères/Contraintes de la table `solar_systems`

ALTER TABLE `solar_systems`
  ADD CONSTRAINT `fk_solar_systems_galaxies_id` FOREIGN KEY (`id_galaxy`) REFERENCES `galaxies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


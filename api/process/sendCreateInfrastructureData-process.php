<?php
session_start();
include_once("../classes/infrastucture_type.php");

$infrastructure_type = new InfrastructureType();

$research_lab_energy = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["energy_cost"];
$research_lab_metal = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["metal_cost"];
$research_lab_deuterium = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["deuterium_cost"];
$research_lab_building_time = $infrastructure_type->getInfrastructure_Type("research_lab")[0]["building_time"];

$space_sit_energy = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["energy_cost"];
$space_sit_metal = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["metal_cost"];
$space_sit_deuterium = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["deuterium_cost"];
$space_sit_building_time = $infrastructure_type->getInfrastructure_Type("space_sit")[0]["building_time"];

$nanites_factory_energy = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["energy_cost"];
$nanites_factory_metal = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["metal_cost"];
$nanites_factory_deuterium = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["deuterium_cost"];
$nanites_factory_building_time = $infrastructure_type->getInfrastructure_Type("nanites_factory")[0]["building_time"];

$metal_mine_energy = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["energy_cost"];
$metal_mine_metal = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["metal_cost"];
$metal_mine_deuterium = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["deuterium_cost"];
$metal_mine_building_time = $infrastructure_type->getInfrastructure_Type("metal_mine")[0]["building_time"];

$solar_plant_energy = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["energy_cost"];
$solar_plant_metal = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["metal_cost"];
$solar_plant_deuterium = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["deuterium_cost"];
$solar_plant_building_time = $infrastructure_type->getInfrastructure_Type("solar_plant")[0]["building_time"];

$fusion_plant_energy = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["energy_cost"];
$fusion_plant_metal = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["metal_cost"];
$fusion_plant_deuterium = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["deuterium_cost"];
$fusion_plant_building_time = $infrastructure_type->getInfrastructure_Type("fusion_plant")[0]["building_time"];

$laser_artillery_energy = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["energy_cost"];
$laser_artillery_metal = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["metal_cost"];
$laser_artillery_deuterium = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["deuterium_cost"];
$laser_artillery_building_time = $infrastructure_type->getInfrastructure_Type("laser_artillery")[0]["building_time"];

$ion_gun_energy = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["energy_cost"];
$ion_gun_metal = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["metal_cost"];
$ion_gun_deuterium = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["deuterium_cost"];
$ion_gun_building_time = $infrastructure_type->getInfrastructure_Type("ion_gun")[0]["building_time"];

$shield_energy = $infrastructure_type->getInfrastructure_Type("shield")[0]["energy_cost"];
$shield_metal = $infrastructure_type->getInfrastructure_Type("shield")[0]["metal_cost"];
$shield_deuterium = $infrastructure_type->getInfrastructure_Type("shield")[0]["deuterium_cost"];
$shield_building_time = $infrastructure_type->getInfrastructure_Type("shield")[0]["building_time"];

$deuterium_synthesizer_energy = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["energy_cost"];
$deuterium_synthesizer_metal = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["metal_cost"];
$deuterium_synthesizer_deuterium = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["deuterium_cost"];
$deuterium_synthesizer_building_time = $infrastructure_type->getInfrastructure_Type("deuterium_synthesizer")[0]["building_time"];

$data = array("research_lab_energy" => $research_lab_energy, "research_lab_metal" => $research_lab_metal, "research_lab_deuterium" => $research_lab_deuterium, "research_lab_building_time" => $research_lab_building_time, 
"space_sit_energy" => $space_sit_energy, "space_sit_metal" => $space_sit_metal, "space_sit_deuterium" => $space_sit_deuterium, "space_sit", "space_sit_building_time" => $space_sit_building_time,
"nanites_factory_energy" => $nanites_factory_energy, "nanites_factory_metal" => $nanites_factory_metal, "nanites_factory_deuterium" => $nanites_factory_deuterium, "nanites_factory_building_time" => $nanites_factory_building_time,
"metal_mine_energy" => $metal_mine_energy, "metal_mine_metal" => $metal_mine_metal, "metal_mine_deuterium" => $metal_mine_deuterium, "metal_mine_building_time" => $metal_mine_building_time,
"solar_plant_energy" => $solar_plant_energy, "solar_plant_metal" => $solar_plant_metal, "solar_plant_deuterium" => $solar_plant_deuterium, "solar_plant_building_time" => $solar_plant_building_time,
"fusion_plant_energy" => $fusion_plant_energy, "fusion_plant_metal" => $fusion_plant_metal, "fusion_plant_deuterium" => $fusion_plant_deuterium, "fusion_plant_building_time" => $fusion_plant_building_time,
"laser_artillery_energy" => $laser_artillery_energy, "laser_artillery_metal" => $laser_artillery_metal, "laser_artillery_deuterium" => $laser_artillery_deuterium, "laser_artillery_building_time" => $laser_artillery_building_time,
"ion_gun_energy" => $ion_gun_energy, "ion_gun_metal" => $ion_gun_metal, "ion_gun_deuterium" => $ion_gun_deuterium, "ion_gun_building_time" => $ion_gun_building_time,
"shield_energy" => $shield_energy, "shield_metal" => $shield_metal, "shield_deuterium" => $shield_deuterium, "shield_building_time" => $shield_building_time,
"deuterium_synthesizer_energy" => $deuterium_synthesizer_energy, "deuterium_synthesizer_metal" => $deuterium_synthesizer_metal, "deuterium_synthesizer_deuterium" => $deuterium_synthesizer_deuterium, "deuterium_synthesizer_building_time" => $deuterium_synthesizer_building_time
);

echo json_encode($data);
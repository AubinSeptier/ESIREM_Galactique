document.addEventListener('DOMContentLoaded', function() {
    const createLabButton = document.querySelector('.createLab');
    const createChantierButton = document.querySelector('.createChantier');
    const createUsineButton = document.querySelector('.createUsine');
    const createMineButton = document.querySelector('.createMine');
    const createCentraleSButton = document.querySelector('.createCentraleS');
    const createCentraleFButton = document.querySelector('.createCentraleF');
    const createLaserButton = document.querySelector('.createLaser');
    const createCanonButton = document.querySelector('.createCanon');
    const createBouclierButton = document.querySelector('.createBouclier');
    const createSyntheButton = document.querySelector('.createSynthe');
    let id_planet = 5;

    let url = "http://localhost/ESIREM_Galactique/api/process/createInfrastructure-process.php";

    createLabButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=research_lab&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createChantierButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=space_sit&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createUsineButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=nanites_factory&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createMineButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=metal_mine&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createCentraleSButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=solar_plant&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createCentraleFButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=fusion_plant&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createLaserButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=laser_artillery&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createCanonButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=ion_gun&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createBouclierButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=shield&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
    createSyntheButton.addEventListener('click', async function(event) {
        let response = await fetch(url + "?infrastructure=deuterium_synthesizer&id_planet" + id_planet, {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){

        }    
        else {
            alert(data.status);
        }

    });
});

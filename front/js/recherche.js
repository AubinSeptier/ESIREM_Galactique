document.addEventListener('DOMContentLoaded', function() {
    const upgradeEnergy = document.querySelector('.research-energy');
    const upgradeLaser = document.querySelector('.research-laser');
    const upgradeIons = document.querySelector('.research-ions');
    const upgradeShield = document.querySelector('.research-shield');
    const updateArmament = document.querySelector('.research-armament');

    let url = "http://localhost/ESIREM_Galactique/api/process/makeResearch-process.php";

    upgradeEnergy.addEventListener('click', async function(event) {
        let response = await fetch(url + "?research=energy", {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){
            alert("tech ENERGIE améliorée");
        }    
        else {
            alert(data.status);
        }

    });

    upgradeLaser.addEventListener('click', async function(event) {
        let response = await fetch(url + "?research=laser", {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){
            alert("tech LASER améliorée");
        }    
        else {
            alert(data.status);
        }

    });

    upgradeIons.addEventListener('click', async function(event) {
        let response = await fetch(url + "?research=ions", {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){
            alert("tech IONS améliorée");
        }    
        else {
            alert(data.status);
        }

    });

    upgradeShield.addEventListener('click', async function(event) {
        let response = await fetch(url + "?research=shield", {
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){
            alert("tech BOUCLIER améliorée");
        }    
        else {
            alert(data.status);
        }

    });
    
    updateArmament.addEventListener('click', async function(event) {
        let response = await fetch(url + "?research=armament",{
            });
        let data = await response.json();
        console.log(data.status);
        if(data.status==="success"){
            alert("tech ARMEMENT améliorée");
        }    
        else {
            alert(data.status);
        }

    });

});


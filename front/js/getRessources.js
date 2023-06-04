document.addEventListener('DOMContentLoaded', async function() {
    const empireNameElement = document.querySelector('#empireName');
    const empireRaceElement = document.querySelector('#empireRace');
    const empireAdjectiveElement = document.querySelector('#empireAdjective');
    const empireDeuteriumElement = document.querySelector('#empireDeuterium');
    const empireEnergyElement = document.querySelector('#empireEnergy');
    const empireEnergyUsedElement = document.querySelector('#empireEnergyUsed');
    const empireMetalElement = document.querySelector('#empireMetal');


    let response = await fetch("http://localhost/ESIREM_Galactique/api/process/sendEmpireData-process.php", {
    });
    let data = await response.json();
      empireNameElement.textContent = data.empireName;
      empireDeuteriumElement.textContent = data.empireDeuterium;
      empireEnergyElement.textContent = data.empireEnergy;
      empireEnergyUsedElement.textContent = data.empireEnergyUsed;
      empireMetalElement.textContent = data.empireMetal;
      if(data == null){
        alert("Erreur lors du chargement des données");
      }
    });
    

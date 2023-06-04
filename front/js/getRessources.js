document.addEventListener('DOMContentLoaded', async function() {
    const empireNameElement = document.querySelector('#empireName');
    const empireRaceElement = document.querySelector('#empireRace');
    const empireAdjectiveElement = document.querySelector('#empireAdjective');
    const empireDeuteriumElement = document.querySelector('#empireDeuterium');
    const empireEnergyElement = document.querySelector('#empireEnergy');
    const empireEnergyUsedElement = document.querySelector('#empireEnergyUsed');
    const empireMetalElement = document.querySelector('#empireMetal');


    fetch("http://localhost/ESIREM_Galactique/api/process/sendEmpireData-process.php")
    .then(response => response.json())
    .then(data => {
      empireNameElement.textContent = data.empireName;
      empireRaceElement.textContent = data.empireRace;
      empireAdjectiveElement.textContent = data.empireAdjective;
      empireDeuteriumElement.textContent = data.empireDeuterium;
      empireEnergyElement.textContent = data.empireEnergy;
      empireEnergyUsedElement.textContent = data.empireEnergyUsed;
      empireMetalElement.textContent = data.empireMetal;
    })
    
    .catch(error => {
    });
    



});

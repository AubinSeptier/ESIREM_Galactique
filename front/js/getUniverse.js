document.addEventListener('DOMContentLoaded', function() {

  function updateUniversesList(data) {
    let selectElement = document.querySelector('.univers select[name="univers"]');
    selectElement.innerHTML = "";

    let allUniverses = data.allUniverses.map(function(universe) {
      return universe.name;
    });

    for (let i = 0; i < allUniverses.length; i++) {
      let option = document.createElement('option');
      option.value = allUniverses[i];
      option.textContent = allUniverses[i];
      selectElement.appendChild(option);
    }
  }

  fetch('http://localhost/ESIREM_Galactique/api/process/sendUniverse-process.php')
    .then(response => response.json())
    .then(data => {
      updateUniversesList(data);
    })
    .catch(error => {
      console.log('Une erreur s\'est produite lors de la récupération des données :', error);
    });
});

  

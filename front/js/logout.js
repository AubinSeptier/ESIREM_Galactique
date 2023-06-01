document.addEventListener('DOMContentLoaded', function() {
  // Récupérer la référence du bouton de déconnexion
  const logoutButton = document.querySelector('.logout-button');

  // Ajouter un gestionnaire d'événement au clic sur le bouton de déconnexion
  logoutButton.addEventListener('click', async function(event) {

    // Effectuer une requête GET vers logout-process.php
    let response = await fetch('http://localhost/ESIREM_Galactique/api/process/disconnectUniverse-process.php', {
    });
    let data = await response.json();
    console.log(data.status);
    if(data.status === "success"){
        window.location.href = "http://localhost/ESIREM_Galactique/front/player.php";
    }
    else{
        alert(data.status);
    }
  });
});
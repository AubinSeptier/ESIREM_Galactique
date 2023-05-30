// Récupérer la référence du bouton de déconnexion
const logoutButton = document.querySelector('.logout-button');

// Ajouter un gestionnaire d'événement au clic sur le bouton de déconnexion
logoutButton.addEventListener('click', function(event) {

  // Effectuer une requête GET vers logout-process.php
  fetch('./logout-process.php')
    .then(response => {
      if (response.ok) {
        // Rediriger vers la page de connexion après déconnexion réussie
        window.location.href = './login.php';
      } else {
        console.error('Erreur lors de la déconnexion');
      }
    })
    .catch(error => {
      console.error('Erreur lors de la déconnexion', error);
    });
});
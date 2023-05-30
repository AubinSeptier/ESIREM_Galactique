document.addEventListener('DOMContentLoaded', function() {
    var createButton = document.querySelector('.univers:first-child .button');
    var inputNomUnivers = document.querySelector('.univers:first-child input[name="nom"]');

    createButton.addEventListener('click', function(event) {
        event.preventDefault();

        var nomUnivers = inputNomUnivers.value;

        if (nomUnivers.trim() !== '') {
            fetch('../../api/process/createUniverse-process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'nom=' + encodeURIComponent(nomUnivers)
            })
            .then(function(response) {
                // Gérer la réponse de la requête ici
                console.log(response);
            })
            .catch(function(error) {
                // Gérer les erreurs ici
                console.error(error);
            });
        }
    });
});
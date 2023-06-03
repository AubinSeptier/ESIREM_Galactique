document.addEventListener('DOMContentLoaded', function() {
    let createButton = document.querySelector('.univers .buttonJoin');
    let selectUniverse = document.querySelector('.univers select[name="univers"]');
    console.log("Fichier bien chargé");

    createButton.addEventListener('click', async function(event) {
        event.preventDefault();
        let selectedUniverse = selectUniverse.value;
        console.log("Bouton cliqué");

        if (selectedUniverse.trim() !== '') {
            let response = await fetch('http://localhost/ESIREM_Galactique/api/process/joinUniverse-process.php' + "?universe=" + selectedUniverse, {
            });

            let data = await response.json();
            console.log(data.status);

            if(data.status === "Empire already exists"){
                window.location.href = "http://localhost/ESIREM_Galactique/front/index.php";
            }
            else if (data.status === "Empire does not exist"){
                window.location.href = "http://localhost/ESIREM_Galactique/front/createEmpire.php";
            }
            else{
                alert(data.status);
            }
        }
    });
});
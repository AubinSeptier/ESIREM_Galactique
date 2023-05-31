document.addEventListener('DOMContentLoaded', function() {
    let createButton = document.querySelector('.univers .button');
    let inputNomUnivers = document.querySelector('.univers input[name="universeName"]');

    createButton.addEventListener('click', async function(event) {
        event.preventDefault();

        let nomUnivers = inputNomUnivers.value;

        if (nomUnivers.trim() !== '') {
            let response = await fetch('http://localhost/ESIREM_Galactique/api/process/createUniverse-process.php' + "?universeName=" + nomUnivers, {
            });
            let data = await response.json();
            console.log(data);

            if(data.status === "success"){
                window.location.href = "http://localhost/ESIREM_Galactique/front/createEmpire.php";
            }
            else{
                alert(data.status);
            }
        }
    });
});
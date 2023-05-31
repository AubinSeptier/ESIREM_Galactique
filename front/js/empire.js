document.addEventListener('DOMContentLoaded', function() {
    let empireForm = document.getElementById('empireForm');
    let successMessage = document.getElementById('successMessage');

    empireForm.addEventListener('submit', async function(event) {
        event.preventDefault();

        let raceInput = document.getElementById('race');
        let adjectifInput = document.getElementById('adjectif');
        let nomInput = document.getElementById('nom');

        let race = raceInput.value.trim();
        let adjective = adjectifInput.value.trim();
        let name = nomInput.value.trim();

        if (race !== '' && adjective !== '' && name !== '') {          

            let response = await fetch('http://localhost/ESIREM_Galactique/api/process/createEmpire-process.php' + '?empireName=' + name + '&empireRace=' + race + '&empireAdjective=' + adjective, {
        });
        let data = await response.json();
            console.log(data);

            if(data.status === "success"){
                window.location.href = "http://localhost/ESIREM_Galactique/front/index.php";
                successMessage.style.display = 'block';
                empireForm.reset();
            }
            else{
                alert(data.status);
            }
        }
    });
});

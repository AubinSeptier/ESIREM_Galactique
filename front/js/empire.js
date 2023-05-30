document.addEventListener('DOMContentLoaded', function() {
    var empireForm = document.getElementById('empireForm');
    var successMessage = document.getElementById('successMessage');

    empireForm.addEventListener('submit', function(event) {
        event.preventDefault();

        var raceInput = document.getElementById('race');
        var adjectifInput = document.getElementById('adjectif');
        var nomInput = document.getElementById('nom');

        var race = raceInput.value.trim();
        var adjectif = adjectifInput.value.trim();
        var nom = nomInput.value.trim();



        if (race !== '' && adjectif !== '' && nom !== '') {
            successMessage.style.display = 'block';
            empireForm.reset();
        }
    });

});

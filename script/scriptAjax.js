window.addEventListener('DOMContentLoaded', () => {
    // BOUTON DE DECONNEXION PAGE COMPTE
    $('#deconnexionAccount').click(function () {
        $.ajax({
            type: 'POST',
            url: 'deconnexion.php',
            success: function (data) {
                alert('Deconnexion...')
                window.location.href = 'index.php';
            }
        });
    });

    // BOUTON DE ANNULATION RESERVATION PAGE COMPTE
    $('#cancelReservation').click(function () {
        $.ajax({
            type: 'POST',
            url: 'cancelReserv.php',
            success: function (data) {
                alert('Inscription à la soirée annulée')
                window.location.href = 'inscriptionsoiree.php';
            }
        });
    });

    // BOUTON DE CHANGEMENT DE DONNEES PAGE COMPTE
    $('#registerData').click(function () {
        console.log('cocou')
        var formData = $('#updateUserForm').serialize();

        $.ajax({
            type: 'POST',
            url: 'majDonnees.php',
            data: formData,
            success: function (response) {
                alert('Données personnels modifiées')
            }
        });
    });

    // BOUTON DE UPDATE MOT DE PASSE PAGE COMPTE
    $('#updateMdp').click(function () {
        var formData = $('#updatePasswordForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'updatePassword.php',
            data: formData,
            success: function (response) {
                alert(response);
            }
        });
    });

    // BOUTON DE SUPPRESSION COMPTE PAGE COMPTE
    $('#deleteAccount').click(function () {
        $.ajax({
            type: 'POST',
            url: 'suppression.php',
            success: function (data) {
                alert('Compte supprimé')
                window.location.href = 'index.php';
            }
        });
    });

    // BOUTON DE DON PAGE DONS.PHP
    $('#confirmerPaiement').click(function (event) {
        let montantPaiement = $('#montantPaiement').val(); // Récupérer la valeur de l'input
        $.ajax({
            type: 'POST',
            url: 'enregistrerDon.php',
            data: { montantPaiement: montantPaiement }, // Utiliser la notation clé-valeur
            success: function (data) {
                alert('Don enregistré ! Merci énormement')
                window.location.href = 'index.php';
            }
        });
    });
})



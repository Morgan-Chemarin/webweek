<?php
session_start();

include('presset/header.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="grayPart"></div>

    <div class="titre">
        <h1 class="h1">Mon compte</h1>
    </div>

    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Personnel')">Paramètres du profil</button>
        <button class="tablinks" onclick="openTab(event, 'Securite')">Mot de passe & sécurité</button>
    </div>
    <div id="Personnel" class="tabcontent">
        <h3 class="titreTabcontent">Modification des informations personnelles</h3>
        <form>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom">
            </div>
            <div class="form-group">
                <label for="prenom">Email</label>
                <input type="text" id="prenom">
            </div>
            <div class="form-group">
                <label for="prenom">Numéro de téléphone</label>
                <input type="text" id="prenom">
            </div>
            <div class="form-group">
                <label for="prenom">Date de naissance</label>
                <input type="text" id="prenom">
            </div>
            <!-- Répétez pour les autres champs -->
        </form>

    </div>
    <div id="Securite" class="tabcontent">
        <h3 class="titreTabcontent">Changer de mot de passe</h3>
    </div>

    <?PHP include('presset/footer.php') ?>

</body>
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementsByClassName('tablinks')[0].click();

</script>

</html>
<?PHP

if (isset($_SESSION['prenom'])) {
    echo "Bonjour " . htmlspecialchars($_SESSION['prenom']) . "! <a href='deconnexion.php'>Se déconnecter</a>";
} else {
    header("Location: connexion.php");
    exit;
}
?>


<?PHP
include('presset/option.php');

$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = :id");
$stmt->bindParam(':id', $_SESSION['id_utilisateur']);
$stmt->execute();
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {

    echo $resultat['nom'];
    echo $resultat['prenom'];
    echo $resultat['mail'];
    echo $resultat['numero'];
    echo $resultat['date_de_naissance'];

}
?>
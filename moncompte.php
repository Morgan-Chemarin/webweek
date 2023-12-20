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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script/scriptAjax.js"></script>

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

    <!-- Premier onglet -->
    <?PHP
    include('presset/option.php');

    try {
        $stmt = $conn->prepare("SELECT nom, prenom, mail, numero, date_de_naissance FROM utilisateurs WHERE id_utilisateur = ?");
        $stmt->execute([$_SESSION['id_utilisateur']]);
        $donnees = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

    }



    ?>
    <div id="Personnel" class="tabcontent">
        <h3 class="titreTabcontent">Modification des informations personnelles</h3>
        <form id="updateUserForm">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?PHP echo htmlspecialchars($donnees['nom']); ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom"
                    value="<?PHP echo htmlspecialchars($donnees['prenom']); ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Email</label>
                <input type="text" id="mail" name="mail" value="<?PHP echo htmlspecialchars($donnees['mail']); ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Numéro de téléphone</label>
                <input type="text" id="numero" name="numero"
                    value="<?PHP echo htmlspecialchars($donnees['numero']); ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Date de naissance</label>
                <input type="text" id="date_de_naissance" name="date_de_naissance"
                    value="<?PHP echo htmlspecialchars($donnees['date_de_naissance']); ?>">
            </div>
        </form>

        <div class="btnContainerCompte">
            <button id="registerData">Enregistrer les modifications</button>
            <button id="deconnexionAccount">Se deconnecter</button>
            <button id="deleteAccount">Supprimer mon compte</a></button>
        </div>


    </div>

    <!-- deuxieme onglets -->
    <div id="Securite" class="tabcontent">
        <h3 class="titreTabcontent">Changer de mot de passe</h3>
        <form id="updatePasswordForm">
            <div class="form-mdp">
                <label for="nom">Ancien mot de passe</label>
                <input type="text" id="ancienmdp" name="ancienmdp" required>
            </div>
            <div class="form-mdp">
                <label for="prenom">Nouveau mot de passe</label>
                <input type="text" id="mdp" name="mdp" required>
            </div>
            <div class="form-mdp">
                <label for="prenom">Conformation du mot de passe</label>
                <input type="text" id="remdp" name="remdp" required>
            </div>
        </form>

        <div class="btnContainerCompte">
            <button type="button" id="updateMdp">Enregistrer le nouveau mot de passe</button>
        </div>
    </div>



   



    <?PHP
    try {

        $stmt = $conn->prepare("SELECT nombre_de_place FROM inscrit WHERE id_utilisateur = :id_utilisateur");
        $stmt->bindParam(':id_utilisateur', $_SESSION['id_utilisateur']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);


            echo "
            <div class='objectif-container'>
            <div class='objectif-text'>
                Réservation à l’évènement
            </div>
            <div class='objectif-bar'>
                <div class='objectif-cercle'></div>
            </div>
        </div>
            <div class='reservationContenaire'>
            <h3>Vous êtes bien inscrit(s) pour l’évènement Ciel étoilé ! </h3>
            <p>Laissez-vous emporter par la féérie du Nouvel An à la Salle Jeanne d'Arc, située au cœur du Puy-en-Velay.
                Réservez votre soirée du 31 décembre dès 19h et plongez dans une ambiance unique. Pour cette soirée
                d'exception, adoptez le thème chic qui ajoutera une note d'élégance à votre réveillon. </p>
            <div id='place'>
                <label for=''>Nombre de place réservé</label>
                <input type='number' name='' id='' value='". $result['nombre_de_place'] ."' readonly>
            </div>
    
            <div class='divCancel'>
                <button id='cancelReservation'>J’annule ma réservation</button>
            </div>
        </div>";



        }


    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    ?>






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

if (!isset($_SESSION['prenom'])) {
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
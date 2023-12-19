<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison des adolescants</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?PHP

    session_start();
    include('presset/header.php') ?>

    <div class="grayPart"></div>

    <div class="apresInscription">

        <h1 class="h1">Inscription - Ciel étoilé</h1>
        <p>Vous êtes conviés à "Ciel Étoilé : Nouvel An sous les Lanternes", un événement festif au Puy-en-Velay qui s'adresse à tous les habitants, 
            jeunes et moins jeunes, désireux de célébrer le passage à la nouvelle année d'une manière magique et mémorable.</p>

        <form action="" method="post" id="ligne">
            <div class="">
                <label for="nombre">Nombre :</label>
        <select id="nombre" name="nombre" required>
            <option value="" disabled selected>Nombres de places</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
            </div>
        
            <input type="submit" value="Je m’inscrit  à l’évènement !">
        </form>
    </div>

    <?PHP
    include "utilisateur.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mail = $_POST["mail"];
        $numero = $_POST["numero"];
        $date_de_naissance = $_POST["date_de_naissance"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        if ($password !== $repassword) {
            echo "Les mots de passe ne correspondent pas.";
            return;
        }

        include('presset/option.php');
        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "L'adresse mail est deja utilisé par un autre compte.";
            return;
        }

        $mdp_hash = password_hash($password, PASSWORD_DEFAULT);


        $utilisateur = new Utilisateur($nom, $prenom, $mail, $numero, $date_de_naissance, $mdp_hash);
        $utilisateur->enregistrer();

        echo "Inscription réussie !";
    }
    ?>

</body>

</html>
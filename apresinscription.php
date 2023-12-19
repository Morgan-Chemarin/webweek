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

    <div class="titre">

        <h1 class="h1">Vous êtes inscrit(e) !</h1>
    </div>
    <div class="evenement">
        <p>Félicitations ! Vous êtes maintenant officiellement membre de notre communauté.
            Bienvenue dans votre espace personnel dédié. Nous sommes ravis de vous accueillir parmi nous.
            Profitez pleinement de tous les avantages réservés à nos membres inscrits.</p>
    </div>
    <div class="titre2">
        <h2 class="h2">Un problème avec votre inscription ?</h2>
        <input type="submit" value="GERER MON INSCRIPTON">
    </div>



    <?PHP
    include "poo/utilisateur.php";

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
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

    <div class="formInscription">

        <h1 class="h1">Inscription</h1>

        <form action="" method="post">
            <div class="inputPair">
                <input type="text" placeholder="Nom" id="nom" name="nom" required>
                <input type="text" placeholder="Prenom" id="prenom" name="prenom" required>
            </div>
            <input type="email" placeholder="Email" id="mail" name="mail" required>
            <div class="inputPair">
                <input type="text" placeholder="Numéro de téléphone" id="numero" name="numero" required>
                <input type="date" placeholder="Date de naissance" id="date_de_naissance" name="date_de_naissance"
                    required>
            </div>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <input type="password" name="repassword" id="repassword" placeholder="Confirmation du mot de passe">
            <input type="submit" value="Je crée mon compte">
            <p id="questionConnexion">Déjà membre ? <a href="connexion.php">Connexion</a></p>


        </form>
    </div>

    <?PHP
    include('presset/footer.php');
    ?>
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
            echo "<script>alert('Les mots de passe ne correspondent pas.')</script>";
            return;
        }

        include('presset/option.php');
        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('L'adresse mail est deja utilisé par un autre compte.')</script>";
            return;
        }

        $mdp_hash = password_hash($password, PASSWORD_DEFAULT);


        $utilisateur = new Utilisateur($nom, $prenom, $mail, $numero, $date_de_naissance, $mdp_hash);
        $utilisateur->enregistrer();

        echo "<script>alert('Inscription réussi !')</script>";
    }
    ?>

</body>

</html>
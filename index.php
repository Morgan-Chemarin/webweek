<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison des adolescents</title>
</head>

<body>
    <form action="" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="S'inscrire">
    </form>


    <?PHP
    include "utilisateur.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $email = $_POST["email"];

        $utilisateur = new Utilisateur($nom, $email);
        // $utilisateur->enregistrer();

        echo "Inscription réussie !";
    }
    ?>

</body>

</html>
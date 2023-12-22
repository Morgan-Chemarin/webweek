<?PHP
include "poo/utilisateur.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login_mail = $_POST['mail'];
    $login_mdp = $_POST['password'];


    try {
        include('presset/option.php');

        $stmt = $conn->prepare("SELECT id_utilisateur, password, prenom FROM utilisateurs WHERE mail = :mail");
        $stmt->bindParam(':mail', $login_mail);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password_from_db = $result['password'];
            $prenom = $result['prenom'];
            $id = $result['id_utilisateur'];

            if (password_verify($login_mdp, $hashed_password_from_db)) {
                echo "Connexion réussie.";
                $_SESSION['prenom'] = $prenom;
                $_SESSION['id_utilisateur'] = $id;

                header("Location: index.php");
                exit;
            } else {
                echo "<script>alert('Le mot de passe est incorrect')</script>";

            }
        } else {
            echo "<script>alert('Aucun utilisateur trouvé avec ce mail')</script>";

        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

}

include('presset/header.php')
    ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison des adolescants</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="grayPart"></div>

    <div class="formInscription" id="connexion">

        <h1 class="h1">Connexion</h1>

        <form action="" method="post">
            <input type="email" placeholder="Email" id="mail" name="mail" required>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <p id="mdpOublie"><a href="passwordforgot.php">Mot de passe oublié ?</a></p>
            <input type="submit" value="Se connecter" id="btnSeconnecter">
            <p id="questionConnexion">Je n'ai pas de compte ? <a href="inscription.php">Inscription</a></p>


        </form>
    </div>


    <?PHP
    include('presset/footer.php');
    ?>


</body>

</html>
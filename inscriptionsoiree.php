<?PHP
session_start();
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
    <?PHP


    include('presset/header.php');
    ?>



    <div class="grayPart"></div>

    <?PHP

    if (isset($_SESSION['prenom'])) {


        echo "<div class='apresInscription'>

        <h1 class='h1'>Inscription - Ciel étoilé</h1>
        <p>Vous êtes conviés à 'Ciel Étoilé : Nouvel An sous les Lanternes', un événement festif au Puy-en-Velay qui
            s'adresse à tous les habitants,
            jeunes et moins jeunes, désireux de célébrer le passage à la nouvelle année d'une manière magique et
            mémorable.</p>
            <form action='' method='post' id='ligne'>
            <div class=''>
                <label for='nombre'>Nombre :</label>
                <select id='nombre' name='nombre' required>
                    <option value='' disabled selected>Nombres de places</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                </select>
            </div>

            <input type='submit' value='Je m’inscrit  à l’évènement !'>
        </form>
    </div>";



    } else {
        echo "Vous n'etes pas connecté, pour se connecter : <a href='connexion.php'>connexion</a>";
    } ?>

    <?PHP

    include('presset/footer.php');
    include "poo/soiree.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_de_place = $_POST["nombre"];
        $id_utilisateur = $_SESSION['id_utilisateur'];

        include('presset/option.php');
        $stmt = $conn->prepare("SELECT * FROM inscrit WHERE id_utilisateur = :id_utilisateur");
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "Vous vous êtes déjà inscrit, allez voir dans votre espace compte pour vérifier.";
        } else {
            $inscription_soiree = new Soiree($id_utilisateur, $nombre_de_place);
            $inscription_soiree->enregistrer();
            // header('Location: apresinscription.php');
            echo "<script>alert('Inscription à la soirée réussi !');</script>";
            exit;
        }

    }

    if (!empty($error)) {
        echo "<script>alert(" . json_encode($error) . "); </script>";
    }


    ?>
</body>

</html>
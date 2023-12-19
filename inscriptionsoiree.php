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
    include('presset/header.php');

    echo $_SESSION['id_utilisateur'];
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
    include "poo/soiree.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_de_place = $_POST["nombre"];

      
        include('presset/option.php');
        $stmt = $conn->prepare("SELECT * FROM inscrit WHERE id_utilisateur = :mail");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "L'adresse mail est deja utilisé par un autre compte.";
            return;
        }

        $mdp_hash = password_hash($password, PASSWORD_DEFAULT);


        $utilisateur = new Utilisateur($nom, $prenom, $mail, $numero, $date_de_naissance, $mdp_hash);
        $utilisateur->afficher();

    }
    ?>



    <?PHP

    include('presset/footer.php');

    ?>

</body>

</html>


<!-- 


`
        
        
        

        
        
    ` -->
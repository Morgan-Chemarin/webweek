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
        <h1 class="h1">Gestion des inscriptions</h1>
    </div>

    <?php
    include('presset/option.php');

    try {

        $sql = "SELECT inscrit.nombre_de_place, utilisateurs.nom, utilisateurs.prenom, utilisateurs.id_utilisateur
            FROM inscrit
            INNER JOIN utilisateurs ON inscrit.id_utilisateur = utilisateurs.id_utilisateur";

        $stmt = $conn->query($sql);
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); // Stocker les résultats dans un tableau PHP
    
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
    ?>

    <table>
        <tr id="hautTableau">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Nombre de places</th>
            <th>Actions</th>
        </tr>

        <?php
        foreach ($resultats as $ligne) {
            echo "<tr class='headerTable'>";
            echo "<td>" . $ligne["nom"] . "</td>";
            echo "<td>" . $ligne["prenom"] . "</td>";
            echo "<td>" . $ligne["nombre_de_place"] . "</td>";
            echo "<td>";
            echo "<form method='POST' action='supprimerAdmin.php'>";
            echo "<input type='hidden' name='id_utilisateur' value='" . $ligne["id_utilisateur"] . "'>"; // Assurez-vous d'avoir une colonne "id_inscription" dans votre table inscrit
            echo "<input type='submit' class='btnSupprAdmin' value='Supprimer'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>



    <?PHP include('presset/footer.php') ?>
</body>

</html>
<?PHP
session_start();

include('presset/header.php')
    ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison des adolescants</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
</head>

<body>

    <div class="grayPart"></div>


    <div class="objectif-container">
        <div class="objectif-text">
            Programme de la soirée
        </div>
        <div class="objectif-bar">
            <div class="objectif-cercle"></div>
        </div>
    </div>

    <div id="monCarrousel" class="carousel slide" data-ride="carousel" data-wrap="true">
        <div class="carousel-inner">
            <?php

            $active = 'active'; // La première carte doit avoir la classe 'active'
            foreach ($donnees as $ligne) {
                echo '<div class="carousel-item ' . $active . '">';
                echo '<img src="' . htmlspecialchars($ligne['image']) . '" class="d-block w-100" alt="...">';
                echo '<div class="carousel-caption d-none d-md-block">';
                echo '<h5>' . htmlspecialchars($ligne['heure_debut']) . '</h5>';
                echo '<p>' . htmlspecialchars($ligne['nom_activite']) . '</p>';
                echo '</div>';
                echo '</div>';
                $active = ''; // Retirer la classe 'active' pour les prochaines cartes
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#monCarrousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#monCarrousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>

    <script>
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 2000, // Définit le temps entre les transitions
                wrap: true // Permet au carrousel de boucler
            });
        });
    </script>










    <?PHP
    include('presset/footer.php');
    ?>


</body>

</html>
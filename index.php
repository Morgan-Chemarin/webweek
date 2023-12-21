<?php
session_start();

include('presset/header.php');
include('presset/option.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script/map.js"></script>
</head>

<body>

    <div class="accueilCiel">
        <div class="partiGauche">
            <div class="zoneBlanche">
                <img src="images/pdt11.png" alt="">
            </div>
            <p>Vous êtes conviés à "Ciel Étoilé : Nouvel An sous les Lanternes", un événement festif au Puy-en-Velay qui
                s'adresse à tous les habitants, jeunes et moins jeunes, désireux de célébrer le passage à la nouvelle
                année d'une manière magique et mémorable. <br>
                Que vous soyez amateur d'art, gourmand en quête de saveurs locales, passionné de traditions festives, ou
                simplement à la recherche d'une soirée divertissante, "Ciel Étoilé" vous promet une expérience pour tous
                les goûts. L'objectif de cette soirée lumineuse est de rassembler la communauté dans une atmosphère
                chaleureuse et festive.</p>
            <button id="btnProgramme">Voir le programme</button>
        </div>
        <img id="rectangle8" src="images/rectangle8.png" alt="">
    </div>

    <div class="objectifPart">
        <div class="objectif-container">
            <div class="objectif-text">
                Objectifs de l'événement
            </div>
            <div class="objectif-bar">
                <div class="objectif-cercle"></div>
            </div>
        </div>
    </div>
    <div class="objectifs">
        <div class="categorieObjectif">
            <img src="images/communication.png" alt="">
            <span>Rassembler la communauté</span>
        </div>
        <div class="categorieObjectif" id="objectifCentral">
            <img src="images/creativite.png" alt="">
            <span>Stimuler la Créativité</span>
        </div>
        <div class="categorieObjectif">
            <img src="images/tradition.png" alt="">
            <span>Instaurer une Tradition Festive</span>
        </div>
    </div>

    <div class="programmePart">

        <div class="objectifPart objectifPart2">
            <div class="objectif-container">
                <div class="objectif-text">
                    Programme </div>
                <div class="objectif-bar">
                    <div class="objectif-cercle" id="fondOrange"></div>
                </div>
            </div>
        </div>


        <div class="container">
            <?php
            try {
                $stmt = $conn->query("SELECT nom_activite, heure_debut, image_activite FROM programme");
                $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($activities as $activity) {
                    echo '<div class="activity-card">';
                    echo '<div class="background-image" style="background-image: url(\'' . htmlspecialchars($activity['image_activite']) . '\');"></div>';
                    echo '<div class="start-time">' . htmlspecialchars($activity['heure_debut']) . '</div>';
                    echo '</div>';
                }
            } catch (PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
            }

            $pdo = null;


            ?>
        </div>

        <div class="centre">
            <button id="voirProgramme"><a href="programme.php">Voir le programme</a></button>
        </div>
    </div>

    <div class="localisation">
        <div class="objectifPart objectifPart2">
            <div class="objectif-container">
                <div class="objectif-text">
                    Venir </div>
                <div class="objectif-bar">
                    <div class="objectif-cercle"></div>
                </div>
            </div>
        </div>

        <div class="contenairMap">
            <div id="map-container">
                <div id="map"></div>
            </div>

            <div class="infoMap">
                <h3 class="titreMap">Où ?</h3>
                <p class="texteMap">Laissez-vous emporter par la féérie du Nouvel An à la Salle Jeanne d'Arc, située au
                    cœur
                    du Puy-en-Velay. </p>
                <h3 class="titreMap">Quand ?</h3>
                <p class="texteMap">Réservez votre soirée du 31 décembre dès 19h et plongez dans une ambiance unique.
                </p>
                <h3 class="titreMap">Comment ?</h3>
                <p class="texteMap">Pour cette soirée d'exception, adoptez le thème chic qui ajoutera une note
                    d'élégance à
                    votre réveillon. </p>
            </div>
        </div>




    </div>

    <?PHP include('presset/footer.php') ?>



</body>

</html>
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
        <h1 class="h1">Programme</h1>
    </div>
    <div class="evenement">
        <p>Découvrez un programme envoûtant lors de la soirée 'Ciel Étoilé : Nouvel An sous les Lanternes' au
            Puy-en-Velay, alliant ateliers créatifs, délices gastronomiques,
            lâcher de lanternes synchronisé et divertissements festifs pour une célébration mémorable du passage à la
            nouvelle année.</p>
    </div>
    <div class="objectifPart">
        <div class="objectif-container">
            <div class="objectif-txt">
                <p>Programme de la soirée</p>
            </div>
            <div class="objectif-bar">
                <div class="objectif-cercle"></div>
            </div>
        </div>
        <div class="carousel-container">
            <div class="carousel-slide" id="slide1">
                <img src="images/imgcar1.png" alt="Slide 1">
            </div>
            <div class="carousel-slide" id="slide2">
                <img src="images/imgcar2.png" alt="Slide 2">
            </div>
            <div class="carousel-slide" id="slide3">
                <img src="images/imgcar3.png" alt="Slide 3">
            </div>
            <div class="carousel-nav">
                <button onclick="prevSlide()">&#10094;</button>
                <button onclick="nextSlide()">&#10095;</button>
            </div>
        </div>

        <script src="script/scripte.js"></script>

</body>

</html>
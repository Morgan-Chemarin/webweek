<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison des adolescants</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .carousel-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: center;

        }

        .carousel-slide {
            display: inline-block;
            width: 33.33%;
        }

        #slide1,
        #slide2,
        #slide3 {
            width: 300px;
            height: auto;
            margin: 2em;
        }

        .carousel-nav {
            position: absolute;
            width: 100%;
            top: 50%;
            display: flex;
            justify-content: space-between;
            pointer-events: none;
        }

        .carousel-nav img {
            pointer-events: all;
            cursor: pointer;
            width: 30px;
            height: 30px;
            margin: 50px;
        }
    </style>
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
    <div class="objectif-container">
        <div class="objectif-txt">
            <p>Programme de la soirée</p>
        </div>
        <div class="objectif-bar">
            <div class="objectif-cercle"></div>
        </div>
    </div>
    <div class="carousel-container">
        <img src="images/imgcar1.png" alt="Slide 1" id="slide1">

        <img src="images/imgcar2.png" alt="Slide 2" id="slide2">

        <img src="images/imgcar3.png" alt="Slide 3" id="slide3">

        <div class="carousel-nav">
            <img src="images/flecheg.png" alt="Précédent" onclick="prevSlide()">
            <img src="images/fleched.png" alt="Suivant" onclick="nextSlide()">
        </div>
    </div>

    <style>
        .programmeContainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .programmeSousContainer {
            margin-bottom: 20px;
        }

        .box {
            width: 300px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #one {
            border-radius: 200px 200px 0px 200px;
            background: #5FC0CE;
        }

        #two {
            background: #FFA857;
        }

        #three {
            border-radius: 200px 200px 0px 200px;
            background: #FF6B57;
        }

        #four {
            border-radius: 200px;
            background: #FF99C8;
        }

        #five {
            background: #5FC0CE;
        }

        #six {
            background: #FFA857;
            border-radius: 0px 200px 200px 200px;
            padding: 2em;
        }

        #seven {
            border-radius: 200px;
            background: #FF6B57;
        }

        #eight {
            background: #FF99C8;
        }


        .margetext {
            padding: 30px;
        }
    </style>
    <div class="objectif-container">
        <div class="objectif-txt">
            <p>Stands partenaires</p>
        </div>
        <div class="objectif-bar">
            <div class="objectif-cercle"></div>
        </div>
    </div>


    <?PHP
        // ici requete sql stand_present  
        // result[0]['image_stand']
    ?>



    <div class="programmeContainer">
        <div class="programmeSousContainer">
            <div class="box" id="one"><img src="images/subway.png" alt="logo subway"></div>
            <div class="box" id="five">
                <div class="margetext">Subway vous régalera en distribuant des cookies délicieusement irrésistibles, une
                    façon savoureuse de célébrer le Nouvel An avec une touche sucrée et réconfortante.</div>
            </div>
        </div>
        <div class="programmeSousContainer">
            <div class="box" id="two">
                <img src="images/saloncyrano.png" alt="logo saloncyrano">
            </div>
            <div class="box" id="six">
                <div class="images/margetext">Le stand vous propose une sélection exquise de petits gâteaux spécialement
                    conçus pour célébrer le Nouvel An.</div>
            </div>
        </div>
        <div class="programmeSousContainer">
            <div class="box" id="three"><img src="images/ptitespepites.png" alt="logo ptitespepites"></div>
            <div class="box" id="seven">
                <div class="margetext">Stands de souvenirs exclusifs mettant en avant les beautés et les symboles de la
                    ville.</div>
            </div>
        </div>
        <div class="programmeSousContainer">
            <div class="box" id="four"><img src="images/atelierdesetoiles.png" alt="logo atelierdesetoiles"></div>
            <div class="box" id="eight">
                <div class="margetext">Atelier de fabrication de lanternes animé par des artisans locaux, mettant en
                    avant les talents créatifs de la région.</div>
            </div>
        </div>
    </div>
    <?PHP include('presset/footer.php') ?>
</body>

<script src="script/scripte.js"></script>

</html>
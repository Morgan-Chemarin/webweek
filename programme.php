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
    include('presset/option.php');

    try {
        $stmt = $conn->prepare("SELECT nom_stand, image_stand, bio_stand FROM stand_present");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    } catch (PDOException $e) {
        echo 'Erreur :' . $e->getMessage();
    }
    // ici requete sql stand_present 
    

    ?>



    <div class="programmeContainer">
        <div class="programmeSousContainer">
            <div class="box" id="one"><img src=" <?PHP echo $result[0]['image_stand']; ?>" alt="logo subway"></div>
            <div class="box" id="five">
                <div class="margetext">
                    <?PHP echo $result[0]['bio_stand']; ?>
                </div>
            </div>
        </div>
        <div class="programmeSousContainer">
            <div class="box" id="two">
                <img src=" <?PHP echo $result[1]['image_stand']; ?>" alt="logo saloncyrano">
            </div>
            <div class="box" id="six">
                <div class="images/margetext">
                    <?PHP echo $result[1]['bio_stand']; ?>
                </div>
            </div>
        </div>
        <div class="programmeSousContainer">
            <div class="box" id="three"><img src=" <?PHP echo $result[2]['image_stand']; ?>" alt="logo ptitespepites">
            </div>
            <div class="box" id="seven">
                <div class="margetext">
                    <?PHP echo $result[2]['bio_stand']; ?>
                </div>
            </div>
        </div>
        <div class="programmeSousContainer">
            <div class="box" id="four"><img src=" <?PHP echo $result[3]['image_stand']; ?>"
                    alt="logo atelierdesetoiles"></div>
            <div class="box" id="eight">
                <div class="margetext">
                    <?PHP echo $result[3]['bio_stand']; ?>
                </div>
            </div>
        </div>





    </div>
    <div class="centre">
        <button id="voirInscription"><a href="inscriptionsoiree.php">Je m'inscrit !</a></button>
    </div>

    <?PHP include('presset/footer.php') ?>
</body>

<script src="script/scripte.js"></script>

</html>
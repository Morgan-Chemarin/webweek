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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script/scriptAjax.js"></script>
</head>

<body>
    <?PHP


    include('presset/header.php') ?>

    <div class="grayPart"></div>


    <div class="titre">
        <h1 class="h1">Donner à MDA</h1>
        <h3 class="h3">Soutenir avec un don</h3>
    </div>
    <div class="evenement">
        <p>Plongez au cœur de la magie du Nouvel An avec notre projet exclusif "Ciel Étoilé" ! Le 31 décembre 2024, la
            salle des fêtes du Puy en Velay accueillera une soirée mémorable,
            mettant en lumière la créativité et le rassemblement de la jeunesse locale. Notre concept propose une
            expérience immersive où les participants confectionnent et libèrent des
            lanternes personnalisées à minuit, illuminant ainsi un ciel étoilé.Votre soutien financier contribuera à la
            réalisation de cette expérience unique tout en permettant à notre
            association d'offrir des activités innovantes aux jeunes, en lien avec la technologie. Ensemble, créons des
            moments inoubliables et investissons dans l'avenir !</p>
    </div>


    <?php
    include('presset/option.php');

    try {
        $query = "SELECT SUM(somme) AS total_dons FROM don";
        $result = $conn->query($query);
        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $totalDons = $row['total_dons'];
            echo '<div class="centre">';
            echo "La somme totale des dons est : $totalDons €";
            echo '</div>';
        } else {
            echo "La requête a échoué.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>


    <div class="objectif-container">
        <div class="objectif-txt">
            <p>Faire un don</p>
        </div>
        <div class="objectif-bar">
            <div class="objectif-cercle"></div>
        </div>
    </div>
    <div class="block">

        <p class="boxe">En soutenant la Maison des Adolescents, vous investissez dans des programmes novateurs
            qui offrent aux jeunes l'opportunité de s'immerger dans le monde de la technologie.
            De la programmation informatique à la conception de jeux vidéo, nous visons à élargir leurs horizons
            et à stimuler leur créativité.
            Votre don contribuera directement à l'achat d'équipements et à la formation d'instructeurs. Chaque
            contribution, grande ou petite, fait une différence significative
            dans la vie de nos jeunes. Rejoignez-nous dans cette aventure exceptionnelle pour éduquer, inspirer
            et préparer la prochaine génération à relever les défis de demain.</p>

        <img class="image" src="images/techno.png" alt="Exemple d'image">

    </div>
    <div class="corp">
        <div class="objectifPart">
            <div class="objectif-container">
                <div class="objectif-txt">
                    <p id="texteBlanc">Où vont mes dons ?</p>
                </div>
                <div class="objectif-bar" id="barblanc">
                    <div class="objectif-cercle" id="cercleBlanc"></div>
                </div>
            </div>
        </div>

        <div class="squarezone">
            <div class="square">
                <p class="squareSpan">25</p>Avec votre don de 25 euros, vous contribuez à éclairer le chemin de
                notre projet "Ciel Étoilé". Chaque euro investi permettra d'embellir la soirée du Nouvel An en
                ajoutant une lueur de magie supplémentaire.
            </div>
            <div class="square">
                <p class="squareSpan">50</p>Votre don de 50 euros fait de vous une "Étoile Bienveillante" de notre
                projet. En plus d'illuminer la soirée du 31 décembre, votre contribution permettra de renforcer
                notre engagement envers la créativité et le rassemblement communautaire.
            </div>
            <div class="square">
                <p class="squareSpan">100</p>Avec votre généreux don de 100 euros, vous formez une "Constellation de
                Soutien" à la réussite de "Ciel Étoilé". Votre contribution offrira des activités innovantes aux
                jeunes, en particulier celles liées à la technologie.
            </div>
        </div>
    </div>

    <div class="objectif-container">
        <div class="objectif-txt">
            <p>Je donne</p>
        </div>
        <div class="objectif-bar">
            <div class="objectif-cercle"></div>
        </div>
    </div>


    <?PHP

    if (isset($_SESSION['id_utilisateur'])) { ?>

        <div class="paiementDiv">
            <div class="donation-container">
                <div class="header">
                    <h1>1. Choisir combien</h1>
                </div>
                <div class="donation-options">

                    <div class="custom-amount">
                        <input type="number" placeholder="Montant libre" id="montantPaiement" name="montantPaiement" />
                        <span class="currency">€</span>
                    </div>
                </div>
            </div>
            <div id="mesCoordonnees">
                <div class="header">
                    <h1>2. Mes coordonnées</h1>
                </div>
                <div class="donation-options">
                    <input class="inputPaiement" type="text" name="" id="" placeholder="Adresse*">
                    <input class="inputPaiement" type="text" name="" id="" placeholder="Adresse complémentaire">

                    <div class="villeAdresse">
                        <input class="inputPaiement" type="text" name="" id="" placeholder="Code postal*">
                        <input class="inputPaiement" type="text" name="" id="" placeholder="Ville*">
                    </div>
                    <select name="selectPays" id="selectPays">
                        <option value="France">France</option>
                        <option value="Espagne">Espagne</option>
                        <option value="Angleterre">Angleterre</option>
                    </select>

                    <div class="centre">
                        <button id="confirmerPaiement">Confirmer le paiement</button>
                    </div>
                </div>
            </div>
        </div>

    <?PHP } else {
        echo "Connectez-vous <a href='connexion.php'>Connexion</a>";
    }
    ?>
    <?PHP include('presset/footer.php') ?>
</body>

<script>
    let inputMontant = document.getElementById('montantPaiement');

    inputMontant.addEventListener('input', function (event) {
        console.log('Montant du don sélectionné:', event.target.value);

        document.getElementById('mesCoordonnees').style.display = 'block';
    });

</script>


</html>
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
            <h1 class="h1">Donner à MDA</h1>
            <h3 class="h3">Soutenir avec un don</h3>
        </div>
            <div class="evenement">
            <p>Plongez au cœur de la magie du Nouvel An avec notre projet exclusif "Ciel Étoilé" ! Le 31 décembre 2024, la salle des fêtes du Puy en Velay accueillera une soirée mémorable, 
                mettant en lumière la créativité et le rassemblement de la jeunesse locale. Notre concept propose une expérience immersive où les participants confectionnent et libèrent des 
                lanternes personnalisées à minuit, illuminant ainsi un ciel étoilé.Votre soutien financier contribuera à la réalisation de cette expérience unique tout en permettant à notre 
                association d'offrir des activités innovantes aux jeunes, en lien avec la technologie. Ensemble, créons des moments inoubliables et investissons dans l'avenir !</p>
            </div>
            <div class="objectifPart">
            <div class="objectif-container">
                <div class="objectif-txt">
                    <p>Faire un don</p>
                </div>
                <div class="objectif-bar">
                    <div class="objectif-cercle"></div>
                </div>
            </div>
            <div class="block">
                
            <div class="text-container">
            <p class="boxe">En soutenant la Maison des Adolescents, vous investissez dans des programmes novateurs qui offrent aux jeunes l'opportunité de s'immerger dans le monde de la technologie. 
            De la programmation informatique à la conception de jeux vidéo, nous visons à élargir leurs horizons et à stimuler leur créativité. 
            Votre don contribuera directement à l'achat d'équipements et à la formation d'instructeurs. Chaque contribution, grande ou petite, fait une différence significative 
            dans la vie de nos jeunes. Rejoignez-nous dans cette aventure exceptionnelle pour éduquer, inspirer et préparer la prochaine génération à relever les défis de demain.</p>
            </div>
            <div class="image-container">
                <img class="image" src="images/techno.png" alt="Exemple d'image">
            </div>
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
            <div class="square"><p class="squareSpan">25</p>Avec votre don de 25 euros, vous contribuez à éclairer le chemin de notre projet "Ciel Étoilé". Chaque euro investi permettra d'embellir la soirée du Nouvel An en ajoutant une lueur de magie supplémentaire.</div>
            <div class="square"><p class="squareSpan">50</p>Votre don de 50 euros fait de vous une "Étoile Bienveillante" de notre projet. En plus d'illuminer la soirée du 31 décembre, votre contribution permettra de renforcer notre engagement envers la créativité et le rassemblement communautaire.</div>
            <div class="square"><p class="squareSpan">100</p>Avec votre généreux don de 100 euros, vous formez une "Constellation de Soutien"  à la réussite de "Ciel Étoilé". Votre contribution offrira des activités innovantes aux jeunes, en particulier celles liées à la technologie.</div>
            </div>
            </div>

            <div class="objectifPart">
            <div class="objectif-container">
                <div class="objectif-txt">
                    <p>Je donne</p>
                </div>
                <div class="objectif-bar">
                    <div class="objectif-cercle"></div>
                </div>
            </div>
        
        <?PHP
        include "utilisateur.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $mail = $_POST["mail"];
            $numero = $_POST["numero"];
            $date_de_naissance = $_POST["date_de_naissance"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];

            if ($password !== $repassword) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }

            include('presset/option.php');
            $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "L'adresse mail est deja utilisé par un autre compte.";
                return;
            }

            $mdp_hash = password_hash($password, PASSWORD_DEFAULT);


            $utilisateur = new Utilisateur($nom, $prenom, $mail, $numero, $date_de_naissance, $mdp_hash);
            $utilisateur->enregistrer();

            echo "Inscription réussie !";
        }
        ?>

    </body>

    </html>
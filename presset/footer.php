<?php

include('presset/option.php');
?>


<footer class="footer-partenaire">
    <div class="container">
        <h2>Nos partenaires</h2>
        <div class="partenaires-logos">


            <?PHP
            try {
                $stmt = $conn->query("SELECT * FROM partenaire");
                $partenaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($partenaires as $partenaire) {
                    echo '<img src="' . htmlspecialchars($partenaire['image_partenaire']) . '" width="70px">';
                }
            } catch (PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
            }

            $pdo = null;
            ?>

        </div>
        <div class="footer-contact">
            <div class="contactCart">
                <img src="images/iconLoca.png" width="20px" alt="">
                <p>4 rue Pierre Farigoule - 43000 Le Puy-en-Velay</p>
            </div>
            <div class="contactCart" id="borderCentre">
                <img src="images/iconPhone.png" width="20px" alt="">
                <p>04 71 06 60 70</p>
            </div>
            <div class="contactCart">
                <img src="images/iconMail.png" width="20px" alt="">
                <a href="mailto:contact@exemple.com">maisondesadolescants@gmail.com</a>
            </div>
        </div>
        <img src="images/logoMDA.png" alt="">
    </div>
</footer>
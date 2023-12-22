<link rel="icon" type="image/png" href="images/logo.ico">

<header class="headerResponsive">
    <div class="total">
        <a href="index.php"><img src="images/logo.png" alt="" width="50px"></a>
        <div class="burger-menu" onclick="toggleMenu()">☰</div>
        <ul class="nav-links">
            <li class="li-header"><a href="index.php">Accueil</a></li>
            <li class="li-header"><a href="programme.php">Programme</a></li>
            <li class="li-header"><a href="inscriptionsoiree.php">Inscription Soirée</a></li>
            <li class="li-header"><a href="dons.php">Don</a></li>
            <?php
            if (isset($_SESSION['prenom'])) {
                echo "<li class='li-header'><a href='moncompte.php'>" . htmlspecialchars($_SESSION["prenom"]) . "</a></li>";
            } else {
                echo "<li class='li-header'><a href='connexion.php'>Connexion</a></li>";
            }
            ?>
        </ul>
    </div>
</header>

<script>
    function toggleMenu() {
        var navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('show');
    }
</script>
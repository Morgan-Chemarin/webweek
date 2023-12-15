<nav class="nav-header">
    <img src="user.png" alt="" width="50px">
    <ul class="ul-header">
        <li class="li-header">Accueil</li>
        <li class="li-header">Programme</li>
        <li class="li-header">Inscription Soirée</li>
        <li class="li-header">Don</li>
        <?php
        if (isset($_SESSION['prenom'])) {
            echo "<li class='li-header'><a href='moncompte.php'>" . htmlspecialchars($_SESSION["prenom"]) . "</a></li>";
        } else {
            echo "<li class='li-header'><a href='#connexion'>Connexion</a></li>";
        }
        ?>
    </ul>
</nav>
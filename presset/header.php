<nav class="nav-header">
    <img src="user.png" alt="" width="50px">
    <ul class="ul-header">
        <li class="li-header">Accueil</li>
        <li class="li-header">Programme</li>
        <li class="li-header">Inscription Soirée</li>
        <li class="li-header">Don</li>
        <?PHP if (isset($_POST['prenom'])) {
            echo "<li class='li-header'>" . $_POST["prenom"] . "</li>";
        } else {
            echo "<li class='li-header'><a href='#coucou'>Inscription</a></li>";
        } ?>

    </ul>
</nav>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La maison des adolescants</title>
    <link rel="stylesheet" href="style.css">

</head>
<script>
    function verifierIdentifiants() {
        console.log("coucou")
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        var adminUsername = 'admin'; // Remplacez par le nom d'utilisateur attendu
        var adminPassword = 'admin123'; // Remplacez par le mot de passe attendu

        if (username === adminUsername && password === adminPassword) {
            window.location.href = 'adminPanel.php';
        } else {
            window.location.href = 'index.php';
        }

        return false; // Pour empêcher le formulaire de soumettre normalement
    }
</script>

<body>
    <?PHP

    session_start();
    include('presset/header.php') ?>

    <div class="grayPart"></div>

    <div class="titre">

        <h1 class="h1">Compte ADMIN</h1>
    </div>

    <form onsubmit="return verifierIdentifiants()" id="formAdmin">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username"><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password"><br>

        <input type="submit" value="Connexion">
    </form>

    <?PHP
    include('presset/footer.php');  
    ?>





</body>

</html>
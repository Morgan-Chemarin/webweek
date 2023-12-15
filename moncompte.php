<?php
session_start();

include('presset/header.php');

if (isset($_SESSION['prenom'])) {
    echo "Bonjour " . htmlspecialchars($_SESSION['prenom']) . "! <a href='deconnexion.php'>Se déconnecter</a>";
} else {
    header("Location: connexion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

</body>

</html>
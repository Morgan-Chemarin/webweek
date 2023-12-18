<?PHP
session_start();

include('presset/header.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?PHP

    if (isset($_SESSION['prenom'])) {
        echo "Voici comment s'inscire";
    } else {
        echo "Connectez-vous";
    }
    ?>

</body>

</html>
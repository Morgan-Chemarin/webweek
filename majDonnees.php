<?php
session_start();
include('presset/option.php');


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$numero = $_POST['numero'];
$date_de_naissance = $_POST['date_de_naissance'];


try {

    $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, mail = ?, numero = ?, date_de_naissance = ? WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $prenom, $mail, $numero, $date_de_naissance, $_SESSION['id_utilisateur']]);

    echo "Mise à jour réussie";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
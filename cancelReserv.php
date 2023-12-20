<?php
session_start();
include('presset/option.php');

try {

    $stmt = $conn->prepare("DELETE FROM inscrit WHERE id_utilisateur = :id;");
    $stmt->bindParam(':id', $_SESSION['id_utilisateur']);
    $stmt->execute();


} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


exit;

<?php
session_start();
include('presset/option.php');


$montantPaiement = $_POST['montantPaiement'];
$id = $_SESSION['id_utilisateur'];
$date = date("Y/d/m");

echo "ID utilisateur : " . $id . "<br>";
echo "Montant : " . $montantPaiement . "<br>";
echo "Date : " . $date . "<br>";


try {

    $stmt = $conn->prepare("INSERT INTO don (id_utilisateur, somme, date) VALUES (:id, :somme, :date)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':somme', $montantPaiement);
    $stmt->bindParam(':date', $date);

    $stmt->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
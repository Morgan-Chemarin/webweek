<?php
session_start();
include('presset/option.php');

try {

    $conn->beginTransaction();

    $sqlInscrit = "DELETE FROM inscrit WHERE id_utilisateur = ?";
    $stmtInscrit = $conn->prepare($sqlInscrit);
    $stmtInscrit->execute([$_SESSION['id_utilisateur']]);

    $sqlUtilisateurs = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
    $stmtUtilisateurs = $conn->prepare($sqlUtilisateurs);
    $stmtUtilisateurs->execute([$_SESSION['id_utilisateur']]);

    $conn->commit();

} catch (PDOException $e) {

    $conn->rollBack();
    echo "Erreur lors de la suppression : " . $e->getMessage();

}



session_destroy();

echo json_encode(['status' => 'success']);

header("Location: inscription.php");
exit;

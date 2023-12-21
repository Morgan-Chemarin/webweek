<?php
include('presset/option.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_inscription = $_POST["id_utilisateur"];

    try {
        $sql = "DELETE FROM inscrit WHERE id_utilisateur = :id_inscription";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id_inscription", $id_inscription, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit;
}
?>
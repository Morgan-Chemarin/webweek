<?php
session_start();
include('presset/option.php');

if (isset($_SESSION['id_utilisateur'])) {

    $ancienMdp = $_POST['ancienmdp'];
    $nouveauMdp = $_POST['mdp'];
    $confirmationMdp = $_POST['remdp'];

    $stmt = $conn->prepare("SELECT password FROM utilisateurs WHERE id_utilisateur = ?");
    $stmt->execute([$_SESSION['id_utilisateur']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($ancienMdp, $user['password'])) {
        if ($nouveauMdp === $confirmationMdp) {

            $nouveauMdpHache = password_hash($nouveauMdp, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE utilisateurs SET password = ? WHERE id_utilisateur = ?");
            $stmt->execute([$nouveauMdpHache, $_SESSION['id_utilisateur']]);

            echo "Mot de passe mis à jour avec succès.";
        } else {
            echo "La confirmation du mot de passe ne correspond pas.";
        }
    } else {
        echo "L'ancien mot de passe est incorrect ou vide.";
    }
} else {
    echo "Utilisateur non connecté.";
}
?>
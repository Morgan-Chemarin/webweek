<?php
class Utilisateur
{
    public $nom;
    public $email;

    public function __construct($nom, $email)
    {
        $this->nom = $nom;
        $this->email = $email;
    }

    public function enregistrer()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=SAE301", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email) VALUES (:nom, :email)");
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':email', $this->email);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $conn = null;
    }
}
?>
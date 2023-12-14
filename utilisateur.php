<?php
class Utilisateur
{
    public $nom;
    public $mail;
    public $prenom;
    public $numero;
    public $password;
    public $date_de_naissance;

    public function __construct($nom, $prenom, $mail, $numero, $date_de_naissance, $password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->numero = $numero;
        $this->date_de_naissance = $date_de_naissance;
        $this->password = $password;
    }
    public function afficher()
    {
        echo $this->nom;
        echo $this->numero;
    }

    public function enregistrer()
    {
        try {
            include('presset/option.php');

            $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, mail, numero, date_de_naissance, password) VALUES (:nom, :prenom, :mail, :numero, :date_de_naissance, :password)");
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':numero', $this->numero);
            $stmt->bindParam(':date_de_naissance', $this->date_de_naissance);
            $stmt->bindParam(':password', $this->password);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

    }
}
?>
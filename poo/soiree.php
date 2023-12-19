<?php
class Soiree
{
    public $nombre_de_place;
    public $id_utilisateur;

    public function __construct($id_utilisateur, $nombre_de_place)
    {
        $this->id_utilisateur = $id_utilisateur;
        $this->nombre_de_place = $nombre_de_place;
    }

    public function enregistrer()
    {
        try {
            include('presset/option.php');

            $stmt = $conn->prepare("INSERT INTO inscrit (id_utilisateur, nombre_de_place) VALUES (:id_utilisateur, :nombre_de_place)");
            $stmt->bindParam(':id_utilisateur', $this->nombre_de_place);
            $stmt->bindParam(':nombre_de_place', $this->nombre_de_place);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

    }
}
?>
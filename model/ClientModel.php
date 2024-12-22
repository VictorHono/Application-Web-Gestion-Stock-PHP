<?php 
    require_once 'connexion.php';
    class ClientModel{
        private $db;
public function __construct ()
{
    $this->db = Database::getConnexion();
}

    // Ajouter un nouveau client
    public function ajouterClient($nom, $prenom, $adresse, $telephone,$email){
    
        $sql = $this->db->prepare("INSERT INTO `client`(`nom`, 
        `prenom`, `adresse`, `tel` , `email`) 
        VALUES (:nom, :prenom, :adresse, :tel, :email)");

        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':prenom', $prenom);
        $sql->bindParam(':adresse', $adresse);
        $sql->bindParam(':tel', $telephone);
        $sql->bindParam(':email', $email);
        $resultat = $sql->execute ();
        return $resultat;

    }
    
    // // fonction qui retourne la liste des clients 
    //     public function listeClient(){
    //         $sql = $this->db->prepare ("SELECT* FROM client");
    //         $sql->execute ();
    //         $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
    //         return $resultat;
    //     }
    public function listeClient(){
        $sql = $this->db->prepare ("SELECT * , CASE WHEN TIMESTAMPDIFF(MINUTE,date_creation, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM client WHERE `status` = '0'");
        $sql->execute ();
        $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    public function listeClientB(){
        $sql = $this->db->prepare ("SELECT * , CASE WHEN TIMESTAMPDIFF(MINUTE,date_creation, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM client WHERE `status` = '1'");
        $sql->execute ();
        $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

 //fonction qui permet de supprimer un etudiant
    // public function supprimerClient($id){
    //     $sql = $this->db->prepare("DELETE FROM client WHERE id_client = :id");
    //     $sql->bindParam(':id',$id);
    //     $result = $sql->execute();
    //     return $result;
    // }

    // modifier un etudiant
    public function modifierClient($id,$nom, $prenom, $adresse, $telephone,$email){
        $sql = $this->db->prepare("UPDATE `client` SET `nom` = :nom, `prenom` = :prenom, `adresse`= :adresse, `tel` = :tel, `email`= :email WHERE id_client = $id ");

        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':prenom', $prenom);
        $sql->bindParam(':adresse', $adresse);
        $sql->bindParam(':tel', $telephone);
        $sql->bindParam(':email', $email);

        $resultat = $sql->execute ();
        return $resultat;
    }
    
    public function SuppressionClient($id){
        $sql = $this->db->prepare("UPDATE `client` SET `status` = '1' WHERE id_client = $id ");
        $resultat = $sql->execute ();
        return $resultat;
    }
    public function DebloquerClient($id){
        $sql = $this->db->prepare("UPDATE `client` SET `status` = '0' WHERE id_client = $id ");
        $resultat = $sql->execute ();
        return $resultat;
    }
    }
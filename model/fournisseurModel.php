<?php 
    require_once 'connexion.php';
    class fournisseurModel{
        private $db;
public function __construct ()
{
    $this->db = Database::getConnexion();
}

    // Ajouter un nouveau client
    public function ajouterfournisseur($nom, $prenom, $adresse, $telephone,$email){
    
        $sql = $this->db->prepare("INSERT INTO `fournisseur`(`nom`, 
        `prenom`, `adresse` , `tel` , `email`) 
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
    public function listefournisseur(){
        $sql = $this->db->prepare ("SELECT* , CASE WHEN TIMESTAMPDIFF(MINUTE,date_creation, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM fournisseur");
        $sql->execute ();
        $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

 //fonction qui permet de supprimer un etudiant
    public function supprimerfournisseur($id){
        $sql = $this->db->prepare("DELETE FROM client WHERE id_client = :id");
        $sql->bindParam(':id',$id);
        $result = $sql->execute();
        return $result;
    }

    // // modifier un etudiant
    // public function modifierEtudiant($id,$nom, $prenom, $datenaiss, $sexe, $telephone, $ville, $adresse){
    //     $sql = $this->db->prepare("UPDATE `etudiant` SET ``nom`=':nom',`prenom`=':prenom',`date_naissance`=':datenaiss',`sexe`=':sexe',`tel`=':tel',`ville`=':ville',`adresse`=':adresse' WHERE id_Etundiant = :id");

    //     $sql->bindParam(':nom', $nom);
    //     $sql->bindParam(':prenom', $prenom);
    //     $sql->bindParam(':datenaiss', $datenaiss);
    //     $sql->bindParam(':sexe', $sexe);
    //     $sql->bindParam(':tel', $telephone);
    //     $sql->bindParam(':ville', $ville);
    //     $sql->bindParam(':adresse', $adresse);

    //     $resultat = $sql->execute ();
    //     return $resultat;
    // }
       
    // // Fonction qui retourne un etudiant a partir de son id 
    // public function getEtudiant($id){
    //     $sql = $this->db->prepare("SELECT* FROM etudiant WHERE id_Etundiant = :id" );
    //     $sql->bindParam(':id', $id);
    //     $resultat = $sql->execute ();
    //     return $resultat;
    // }
    // }

    public function modifierFournisseur($id,$nom, $prenom, $adresse, $telephone,$email){
        $sql = $this->db->prepare("UPDATE `fournisseur` SET `nom` = :nom, `prenom` = :prenom, `adresse`= :adresse, `tel` = :tel, `email`= :email WHERE id_fournisseur = $id ");

        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':prenom', $prenom);
        $sql->bindParam(':adresse', $adresse);
        $sql->bindParam(':tel', $telephone);
        $sql->bindParam(':email', $email);

        $resultat = $sql->execute ();
        return $resultat;
    }
    }
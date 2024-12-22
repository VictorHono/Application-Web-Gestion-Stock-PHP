<?php 
    require_once 'connexion.php';
    class CategorieModel{
        private $dbname;
        public function __construct ()
        {
            $this->dbname = Database::getConnexion();
        }

    // Ajouter un nouveau etudiant
    public function ajouterCategorie($nom_Categorie){
    if(!empty($nom_Categorie)){
         $sql = $this->dbname->prepare("INSERT INTO `categorie` (`nom`) VALUES (:nom_Categorie)");
        $sql->bindParam(':nom_Categorie', $nom_Categorie);
        $resultat = $sql->execute();
        return $resultat;
    }
}
       
    // fonction qui retourne la liste des Categories
        public function listeCategorie(){
            $sql = $this->dbname->prepare ("SELECT* FROM categorie");
            $sql->execute ();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
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
       
    public function updateProduit($id, $nom_article, $categorie, $quantite, $prix_u, $date_fabrication, $date_expiration) {
        $sql = $this->dbname->prepare("UPDATE produit
                SET nom = :nom_article, categorie = :categorie, quantite = :quantite, prix_u = :prix_u, date_fabrication = :date_fabrication, date_expiration =  :date_expiration 
                WHERE id_produit = :id");

            $sql->bindParam(':nom_article', $nom_article);
            $sql->bindParam(':categorie', $categorie);
            $sql->bindParam(':quantite', $quantite);
            $sql->bindParam(':prix_u',  $prix_u);
            $sql->bindParam(':date_fabrication', $date_fabrication);
            $sql->bindParam(':date_expiration', $date_expiration);

            $resultat = $sql->execute();

        return $resultat;
    }
    public function modifierCategorie($id, $nom_Categorie) {
        $sql = $this->dbname->prepare("UPDATE categorie
                SET `nom` = :nom_categorie
                WHERE `id_categorie` = $id ");
            $sql->bindParam(":nom_Categorie", $nom_Categorie);
            $resultat = $sql->execute();

        return $resultat;
    }
}
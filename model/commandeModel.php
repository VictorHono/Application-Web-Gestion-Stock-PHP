<?php 
    require_once 'connexion.php';
    
    class commandeModel{

        private $dbname;
        
        public function __construct ()
        {
            $this->dbname = Database::getConnexion();
        }
        
        public function getQuantite($id_produit){
            $req  = $this->dbname->prepare("SELECT `quantite` FROM produit
                WHERE id_produit = :id_produit");
            $req->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
            $req ->execute();
                
                $quantite2 = $req->fetchColumn();
                return $quantite2 ;
        }
    // Ajouter une nouvelle vente
    public function ajoutercommande($id_produit, $id_fournisseur, $quantite,$prix){
    if(!empty($id_produit)&&!empty($id_fournisseur)&&!empty($quantite)&&!empty($prix)){
        $i = $this->getQuantite($id_produit);

        $sql = $this->dbname->prepare("INSERT INTO `commande`(`id_produit`, 
                `id_fournisseur`, `quantite`, `prix`) 
                VALUES (:id_produit, :id_fournisseur, :quantite, :prix)");

                $sql->bindParam(':id_produit', $id_produit);
                $sql->bindParam(':id_fournisseur', $id_fournisseur);
                $sql->bindParam(':quantite', $quantite);
                $sql->bindParam(':prix',  $prix);
                $resultat = $sql->execute();

                if($sql->rowCount()!=0){
                    $NewQ = $i + $quantite;
                    $sql = $this->dbname->prepare("UPDATE `produit` SET `quantite`='$NewQ' WHERE id_produit = '$id_produit'");
                    $sql->execute();
                    if($sql->rowCount()!=0){
                    $_SESSION['message2']['text']= "Mail envoyer et stock mis à jour avec succès !";
                    $_SESSION['message2']['type']= "success";
                    return $resultat;
                    }else{
                        $_SESSION['message2']['text']= "impossible de faire cette commande";
                    $_SESSION['message2']['type']= "warning";
                    }
                
                }else{
                    $_SESSION['message2']['text']= "une erreur s'est produit lors de l'enregistrement de la commande";
                    $_SESSION['message2']['type']= "warning";
                
                }
    }else{
        $_SESSION['message2']['text']= "une information obligatoire n'a pas ete renseigner.<br> veuillez remplire tout les champs";
        $_SESSION['message2']['type']= "danger";
    }
}
       
    // fonction qui retourne la liste des produits
        public function listeCommande(){
            $sql = $this->dbname->prepare ("SELECT p.nom as nom_prod, f.nom, f.prenom, p.quantite, prix, date_commande, co.quantite as q_commande , co.id_commande, p.prix_u, f.adresse, f.tel, p.id_produit,
            CASE WHEN TIMESTAMPDIFF(MINUTE,date_commande, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM fournisseur as f , produit as p , commande as co WHERE co.id_produit = p.id_produit AND co.id_fournisseur = f.id_fournisseur  ");
            $sql->execute ();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        public function GetAllCommande(){
            $sql = $this->dbname->prepare ("SELECT COUNT(*) AS nbre FROM commande ");
            $sql->execute();
            $resultat = $sql->fetch();
            return $resultat;
        }

        public function getFournisseurEmail($fournisseurId)
        {
            $sql = "SELECT email FROM fournisseur WHERE id_fournisseur = :id_fournisseur";
            $stmt = $this->dbname->prepare($sql);
            $stmt->bindParam(':id_fournisseur', $fournisseurId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['email'] ?? null;
        }
        public function getProduitNom($produitId)
        {
            $sql = "SELECT nom FROM produit WHERE id_produit = :id_produit";
            $stmt = $this->dbname->prepare($sql);
            $stmt->bindParam(':id_produit', $produitId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['nom'] ?? null;
        }
    


 //fonction qui permet de supprimer un etudiant
    // public function AnnulerCommande($id,$id_produit,$quantite){
    //     $sql = $this->dbname->prepare("UPDATE commande SET etat='1' WHERE id_commande = :id");
    //     $sql->bindParam(':id',$id);
    //     $result = $sql->execute();
    //     if($sql->rowCount()!=0){
    //     $req = $this->dbname->prepare("UPDATE produit SET quantite=quantite+'$quantite' WHERE id_produit = :id_produit");
    //     $req->bindParam(':id_produit',$id_produit);
    //     $result = $req->execute();
    //     return $result;
    //     }
    // }


    // public function updateVente($id, $nom_article, $categorie, $quantite, $prix_u, $date_fabrication, $date_expiration) {
    //     $sql = $this->dbname->prepare("UPDATE produit
    //             SET nom = :nom_article, categorie = :categorie, quantite = :quantite, prix_u = :prix_u, date_fabrication = :date_fabrication, date_expiration =  :date_expiration 
    //             WHERE id_produit = :id");

    //         $sql->bindParam(':nom_article', $nom_article);
    //         $sql->bindParam(':categorie', $categorie);
    //         $sql->bindParam(':quantite', $quantite);
    //         $sql->bindParam(':prix_u',  $prix_u);
    //         $sql->bindParam(':date_fabrication', $date_fabrication);
    //         $sql->bindParam(':date_expiration', $date_expiration);

    //         $resultat = $sql->execute();

    //     return $resultat;
    // }

}
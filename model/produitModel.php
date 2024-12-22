<?php 
    require_once 'connexion.php';
    class ProduitModel{
        private $dbname;
        public function __construct ()
        {
            $this->dbname = Database::getConnexion();
        }

    // Ajouter un nouveau etudiant
    public function ajouterProduit($nom_article, $id_categorie, $quantite, $prix_u, $date_fabrication, $date_expiration){
    if(!empty($nom_article)&&!empty($id_categorie)&&!empty($quantite)&&!empty( $prix_u)&&!empty($date_fabrication)&&!empty($date_expiration)){
         $sql = $this->dbname->prepare("INSERT INTO `produit`(`nom`, 
        `id_categorie`, `quantite`, `prix_u`, `date_fabrication`, `date_expiration`) 
        VALUES (:nom_article, :id_categorie, :quantite, :prix_u, :date_fabrication, :date_expiration)");

        $sql->bindParam(':nom_article', $nom_article);
        $sql->bindParam(':id_categorie', $id_categorie);
        $sql->bindParam(':quantite', $quantite);
        $sql->bindParam(':prix_u',  $prix_u);
        $sql->bindParam(':date_fabrication', $date_fabrication);
        $sql->bindParam(':date_expiration', $date_expiration);
        
        $resultat = $sql->execute();

        if($sql->rowCount()!=0){
            $_SESSION['message']['text']= "article ajouter avec succes";
            $_SESSION['message']['type']= "success";
        return $resultat;
        }else{
            $_SESSION['message']['text']= "une erreur s'est produit lors de l'ajout de l'article";
            $_SESSION['message']['type']= "warning";
        }
    }else{
        $_SESSION['message']['text']= "une information obligatoire n'a pas ete renseigner.<br> veuillez remplire tout les champs";
        $_SESSION['message']['type']= "danger";
    }
    

       

    }
       
    // fonction qui retourne la liste des produits
        public function listeProduit(){
            $sql = $this->dbname->prepare ("SELECT p.nom as nom_produit,ca.nom as nom_categorie,p.quantite,p.prix_u,p.date_fabrication,p.date_expiration,ca.id_categorie ,p.id_produit
            FROM produit as p, categorie as ca where p.id_categorie=ca.id_categorie ");
            $sql->execute ();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        public function GetAllProduit(){
            $sql = $this->dbname->prepare ("SELECT COUNT(*) AS nbre FROM produit");
            $sql->execute();
            $resultat = $sql->fetchColumn();
            return $resultat;
        }

        public function RechercheProduit($searchDATA = array()){
            $search ="";
            extract($searchDATA);
            if(!empty($nom_article)) $search .= " AND p.nom LIKE '%$nom_article' ";

            $sql = $this->dbname->prepare ("SELECT p.nom as nom_produit, ca.nom as nom_categorie,p.quantite,p.prix_u,p.date_fabrication,p.date_expiration,ca.id_categorie ,p.id_produit
            FROM produit as p, categorie as ca where p.id_categorie=ca.id_categorie $search ");
            $sql->execute ();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

 //fonction qui permet de supprimer un etudiant
    public function supprimerProduit($id){
        $sql = $this->dbname->prepare("DELETE FROM produit WHERE id_produit = :id");
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
       
    public function modifierProduit($id, $nom_article, $id_categorie, $quantite, $prix_u) {
        $sql = $this->dbname->prepare("UPDATE produit
                SET nom = :nom_article, id_categorie = :id_categorie, quantite = :quantite, prix_u = :prix_u
                WHERE id_produit = '$id' ");

            $sql->bindParam(':nom_article', $nom_article);
            $sql->bindParam(':id_categorie', $id_categorie);
            $sql->bindParam(':quantite', $quantite);
            $sql->bindParam(':prix_u',  $prix_u);


            $resultat = $sql->execute();

        return $resultat;
    }
    public function getProduitsLesPlusVendus($limit = 10)
    {
        $sql = "SELECT p.nom AS produit, SUM(v.quantite) AS total_vendu
                FROM produit p
                JOIN vente v ON p.id = v.produit_id
                GROUP BY p.id, p.nom
                ORDER BY total_vendu DESC
                LIMIT :limit";
        $stmt = $this->dbname->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    }

    
   

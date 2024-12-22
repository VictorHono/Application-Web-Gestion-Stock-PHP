<?php 
    require_once 'connexion.php';
    
    class venteModel{

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
    public function ajouterVente($id_produit, $id_client, $quantite,$prix){
    if(!empty($id_produit)&&!empty($id_client)&&!empty($quantite)&&!empty($prix)){
        $i = $this->getQuantite($id_produit);
    if($quantite > $i ){
        $_SESSION['message2']['text']= "La quantite demandee est superieure a celle en stock ($i)";
        $_SESSION['message2']['type']= "danger";
        }else{
        $sql = $this->dbname->prepare("INSERT INTO `vente`(`id_produit`, 
                `id_client`, `quantite`, `prix`) 
                VALUES (:id_produit, :id_client, :quantite, :prix)");

                $sql->bindParam(':id_produit', $id_produit);
                $sql->bindParam(':id_client', $id_client);
                $sql->bindParam(':quantite', $quantite);
                $sql->bindParam(':prix',  $prix);
                // $sql->bindParam('::date_vente',  $date_vente);
                $resultat = $sql->execute();
                // $vente= $sql->fetch();
                // $_SESSION['id_vente'] = $vente->id_vente;
                

                if($sql->rowCount()!=0){
                    $NewQ = $i -$quantite;
                    $sql = $this->dbname->prepare("UPDATE `produit` SET `quantite`='$NewQ' WHERE id_produit = '$id_produit'");
                    $sql->execute();
                    if($sql->rowCount()!=0){
                    $_SESSION['message2']['text']= "vente enregistrer avec succes";
                    $_SESSION['message2']['type']= "success";
                    return $resultat;
                    }else{
                        $_SESSION['message2']['text']= "impossible de faire cette vente ";
                    $_SESSION['message2']['type']= "warning";
                    }
                
                }else{
                    $_SESSION['message2']['text']= "une erreur s'est produit lors de l'enregistrement de la vente";
                    $_SESSION['message2']['type']= "warning";
                
                }
    }}else{
        $_SESSION['message2']['text']= "une information obligatoire n'a pas ete renseigner.<br> veuillez remplire tout les champs";
        $_SESSION['message2']['type']= "danger";
    }
}
       
    // fonction qui retourne la liste des produits
        public function listeVente(){
            $sql = $this->dbname->prepare ("SELECT p.nom as nom_prod, c.nom, c.prenom, p.quantite, prix, date_vente , v.quantite as q_vente , v.id_vente, p.prix_u, c.adresse, c.tel, p.id_produit, v.etat,
            CASE WHEN TIMESTAMPDIFF(MINUTE,date_vente, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM client as c , produit as p , vente as v WHERE v.etat ='0' AND v.id_produit = p.id_produit AND v.id_client = c.id_client ");
            $sql->execute ();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        public function GetLastVente(){
            $sql = $this->dbname->prepare ("SELECT p.nom as nom_prod, c.nom, c.prenom, p.quantite, prix, date_vente , v.quantite as q_vente , v.id_vente, p.prix_u, c.adresse, c.tel, p.id_produit, v.etat,
            CASE WHEN TIMESTAMPDIFF(MINUTE,date_vente, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM client as c , produit as p , vente as v WHERE v.etat ='0' AND v.id_produit = p.id_produit AND v.id_client = c.id_client 
            ORDER BY date_vente DESC LIMIT 10");
            $sql->execute ();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        public function GetMostVente(){
            $sql = $this->dbname->prepare ("SELECT p.nom as nom_prod, SUM(prix) AS prix FROM produit as p , vente as v WHERE v.etat ='0' AND v.id_produit = p.id_produit AND v.id_client = c.id_client 
            GROUP BY p.id_produit ORDER BY SUM(prix) DESC LIMIT 10");
            $sql->execute ();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

 //fonction qui permet de supprimer un etudiant
    public function AnnulerVente($id,$id_produit,$quantite){
        $sql = $this->dbname->prepare("UPDATE vente SET etat='1' WHERE id_vente = :id");
        $sql->bindParam(':id',$id);
        $result = $sql->execute();
        if($sql->rowCount()!=0){
        $req = $this->dbname->prepare("UPDATE produit SET quantite=quantite+'$quantite' WHERE id_produit = :id_produit");
        $req->bindParam(':id_produit',$id_produit);
        $result = $req->execute();
        return $result;
        }
    }

    public function GetAllVentes(){
        $sql = $this->dbname->prepare ("SELECT COUNT(*) AS nbre FROM vente where etat='0' ");
        $sql->execute();
        $resultat = $sql->fetchColumn();
        return $resultat;
    }
    
    public function GetCA(){
        $sql = $this->dbname->prepare ("SELECT SUM(prix) AS prix FROM vente where etat='0' ");
        $sql->execute();
        $resultat = $sql->fetchColumn();
        return $resultat;
    }

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

    public function getVentesParJour()
    {
        $sql = "SELECT DATE(date_vente) AS date, SUM(prix) AS total_ventes 
                FROM vente where etat='0'
                GROUP BY DATE(date_vente) 
                ORDER BY DATE(date_vente) ASC";
        $stmt = $this->dbname->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
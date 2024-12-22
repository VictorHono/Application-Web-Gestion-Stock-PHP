<?php 
    require_once 'connexion.php';
    
    class recuModel{

        private $dbname;
        
        public function __construct ()
        {
            $this->dbname = Database::getConnexion();
        }

    // fonction qui retourne la liste des produits
        public function recuVente($id){
            $sql = $this->dbname->prepare ("SELECT p.nom as nom_prod, c.nom, c.prenom, p.quantite, prix, date_vente , v.quantite as q_vente , v.id_vente, p.prix_u, c.adresse, c.tel,
            CASE WHEN TIMESTAMPDIFF(MINUTE,date_vente, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM client as c , produit as p , vente as v WHERE v.id_produit = p.id_produit AND v.id_client = c.id_client AND v.id_vente='$id'");
            $sql->execute (array());
            $resultat = $sql->fetch();
            return $resultat;
        }

        // fonction qui retourne la liste des produits
        public function GrandRecuVente($id_client){
            $sql = "SELECT p.nom as nom_prod, c.nom as nom_client, c.prenom, p.quantite, prix, date_vente , v.quantite as q_vente , v.id_vente, p.prix_u, c.adresse, c.tel,
            CASE WHEN TIMESTAMPDIFF(MINUTE,date_vente, NOW()) <= 15 THEN 1 ELSE 0 END AS is_new FROM client as c , produit as p , vente as v WHERE v.id_produit = p.id_produit AND c.id_client='$id_client' AND v.id_client = '$id_client' AND v.etat='0'
            AND TIMESTAMPDIFF(MINUTE,date_vente, NOW()) <= 15";
            $stmt= $this->dbname->query($sql);
            return  $stmt->fetchAll(PDO:: FETCH_ASSOC);
        }

 //fonction qui permet de supprimer un etudiant
    // public function supprimerVente($id){
    //     $sql = $this->dbname->prepare("DELETE FROM produit WHERE id_produit = :id");
    //     $sql->bindParam(':id',$id);
    //     $result = $sql->execute();
    //     return $result;
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
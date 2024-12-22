<?php 

require_once './model/produitModel.php';

    class recuController {
        private $recuModel;

        public function __construct() {
            $this->recuModel = new recuModel();
        }

        // Controlleur aqui affiche la liste des produits
        public function afficherrecu($id): void       {
            $recu= $this->recuModel->recuVente($id);
            $_SESSION['recu'] = $recu;
            header("location:./view/recu.php");
        }

        public function afficherGrandrecu($id_client): void       {
            $GrandRecu= $this->recuModel->GrandRecuVente($id_client);
            $_SESSION['GrandRecu'] = $GrandRecu;
            header("location:./view/GrandRecu.php");
        }

        // }

        // // Controller qui affiche le formulaire d'ajout d'un etudiant
        // public function afficherFormulaireAjout(){
        //     require_once './views/ajoutEtudiant.php';
        // }
        
        // Controller qui supprime un etudiant avec un parametre id
    //    public function deletePoduit($id_produit){
    //     $this->produitModel->supprimerProduit($id_produit);
    //     header('location:index.php');
    //    }

    //     //  Conrolleur d'ajout d'un etudiant 
    //     public function editEtudiant($donnee){
    //         $this->etudiantModel->modifierEtudiant($donnee['id'],$donnee['nom'], $donnee['prenom'],$donnee['datenaiss'],$donnee['sexe'],
    //         $donnee['telephone'],$donnee['ville'], $donnee['adresse']);
    //         // Rediger vers la liste des etudiants
    //         header('Location:index.php');
          
    //     }

    // public function modifierProduit() {
    //     $id = $_POST['id'];
    //     $nom_article = $_POST['nom_article'];
    //     $categorie = $_POST['categorie'];
    //     $quantite = $_POST['quantite'];
    //     $prix_u = $_POST['prix_u'];
    //     $date_fabrication = $_POST['date_fabrication'];
    //     $date_expiration = $_POST['date_expiration'];
    
    //     // Appeler le modèle pour mettre à jour le produit
    //     $produitModel = new ProduitModel();
    //     $success = $produitModel->updateProduit($id, $nom_article, $categorie, $quantite, $prix_u, $date_fabrication, $date_expiration);
    
    //     if ($success) {
    //         // header('Location: ../index.php?action=liste_produits&status=success');
    //         header('Location: ../index.php?action=liste_produits&status=success');
    //     } else {
    //         header('Location: ../index.php?action=liste_produits&status=error');
    //     }
    // }

    }


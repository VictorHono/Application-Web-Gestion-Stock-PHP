<?php 
session_start();
require_once './model/produitModel.php';

    class ProduitController {
        private $produitModel;

        public function __construct() {
            $this->produitModel = new ProduitModel();
        }

        //  Conrolleur d'ajout d'un produit 
        public function addProduit($donnee){
            $this->produitModel->ajouterProduit($donnee['nom_article'], $donnee['id_categorie'],$donnee['quantite'],$donnee['prix_u'],
            $donnee['date_fabrication'],$donnee['date_expiration']);
            // Rediger vers la liste des etudiants
            header("location: ./view/article.php");
          
        }
        // Controlleur aqui affiche la liste des produits
        public function afficherproduit(){
            $produit = $this->produitModel->listeProduit();
            $_SESSION['prod']= $produit;
            header("location:./view/article.php");
        }
        public function searchProduit($donnee){
            $searchproduit = $this->produitModel->RechercheProduit($donnee);
            $_SESSION['prod']= $searchproduit;
            header("location:./view/article.php");
        }
        
        public function DasboadProduits(){
            $ALLproduit = $this->produitModel->GetAllProduit();
            $_SESSION['ALLprod'] = $ALLproduit;
            header("location:./view/dashboard.php");
        }

        // // Controller qui affiche le formulaire d'ajout d'un etudiant
        // public function afficherFormulaireAjout(){
        //     require_once './views/ajoutEtudiant.php';
        // }
        
        // Controller qui supprime un etudiant avec un parametre id
       public function deletePoduit($id_produit){
        $this->produitModel->supprimerProduit($id_produit);
        header('location:index.php');
       }

    //     //  Conrolleur d'ajout d'un etudiant 
    //     public function editEtudiant($donnee){
    //         $this->etudiantModel->modifierEtudiant($donnee['id'],$donnee['nom'], $donnee['prenom'],$donnee['datenaiss'],$donnee['sexe'],
    //         $donnee['telephone'],$donnee['ville'], $donnee['adresse']);
    //         // Rediger vers la liste des etudiants
    //         header('Location:index.php');
          
    //     }

    public function editProduit($donnee) {
    
        $this->produitModel->modifierProduit($donnee['id'], $donnee['nom'], $donnee['id_categorie'],$donnee['quantite'],$donnee['prix_u']);
        header("location: ./index.php?action=afficherproduit");

    }

    public function produitsLesPlusVendus()
    {
        // Récupérer les produits les plus vendus
        $produits = $this->produitModel->getProduitsLesPlusVendus();
        $_SESSION['tbv']=$produits;
        // Charger la vue avec les données des produits
        
        require './view/dashboard.php';
    }


    }


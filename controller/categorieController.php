<?php 

require_once './model/produitModel.php';

    class CategorieController {
        private $CategorieModel;

        public function __construct() {
            $this->CategorieModel = new CategorieModel();
        }

        //  Conrolleur d'ajout d'un produit 
        public function addCategorie($donnee){
            $this->CategorieModel->ajouterCategorie($donnee['nom']);
            // Rediger vers la liste des etudiants
            header("location: ./view/categorie.php");
          
        }
        // Controlleur aqui affiche la liste des produits
        public function afficherCategorie(){
            $Categorie = $this->CategorieModel->listeCategorie();
            $_SESSION['Categorie']= $Categorie;
            header("location:./view/categorie.php");
        }
        


    //     //  Conrolleur d'ajout d'un etudiant 
    //     public function editEtudiant($donnee){
    //         $this->etudiantModel->modifierEtudiant($donnee['id'],$donnee['nom'], $donnee['prenom'],$donnee['datenaiss'],$donnee['sexe'],
    //         $donnee['telephone'],$donnee['ville'], $donnee['adresse']);
    //         // Rediger vers la liste des etudiants
    //         header('Location:index.php');
          
    //     }

    public function editCategorie($donnee) {
    
        $this->CategorieModel->modifierCategorie($donnee['id'], $donnee['nom']);
        header("location: ./index.php?action=afficherCategorie");

    }

    }
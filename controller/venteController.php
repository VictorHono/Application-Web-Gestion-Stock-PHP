<?php 

require_once './model/produitModel.php';

    class venteController {
        private $venteModel;

        public function __construct() {
            $this->venteModel = new venteModel();
        }

        //  Conrolleur d'ajout d'un produit 
        public function addVente($donnee){
            $this->venteModel->ajouterVente($donnee['id_produit'], $_SESSION['bn']=$donnee['id_client'],$donnee['quantite'],$donnee['prix']);
            // Rediger vers la liste des etudiants
            header("location: ./view/vente.php");
          
        }
        // Controlleur aqui affiche la liste des produits
        public function affichervente(): void{
            $ventes = $this->venteModel->listeVente();
            $_SESSION['vents']= $ventes;
            header("location:./view/vente.php");
        }

        public function DasboadLastVentes(): void{
            $Lastventes = $this->venteModel->GetLastVente();
            $_SESSION['LastVents']= $Lastventes;
            header("location:./view/dashboard.php");
        }
        

        public function DasboadVentes(): void{
            $ALLventes = $this->venteModel->GetAllVentes();
            $_SESSION['ALLvents'] = $ALLventes;
            header("location:./view/dashboard.php");
        }

        public function DasboadCA(): void{
            $CA = $this->venteModel->GetCA();
            $_SESSION['CA'] = $CA;
            header("location:./view/dashboard.php");
        }

        public function DasboadMostVentes(): void {
            $Mostventes = $this->venteModel->GetMostVente();
            $_SESSION['MostVents']= $Mostventes;
            header("location:./view/dashboard.php");
        }
        
        //Controller qui supprime un etudiant avec un parametre id
       public function cancelVente($id,$id_produit,$quantite): void{
        $this->venteModel->AnnulerVente($id,$id_produit,$quantite);
        header("location:./view/vente.php");
       }

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
 /**
     * Afficher la page d'analyse des ventes.
     */
    public function analyse()
    {
        // Récupérer les données des ventes depuis le modèle
        $Aventes = $this->venteModel->getVentesParJour();
        $_SESSION["analyse"]=$Aventes;
        // Charger la vue avec les données des ventes
        header("location: ./views/analyse.php");
    }
    }


<?php 

require_once './model/fournisseurModel.php';

    class fournisseurController{
        private $fournisseurModel ;

        public function __construct() {
            $this->fournisseurModel = new fournisseurModel();
        }
        //  Conrolleur d'ajout d'un fournisseur
        public function addFournisseur($donnee){
            $this->fournisseurModel->ajouterfournisseur($donnee['nom'], $donnee['prenom'],$donnee['adresse'],$donnee['telephone'],
            $donnee['email']);
            // Rediger vers la liste des fournisseurs
            // header("location: ./view/client.php");
            header("location: ./index.php?action=afficherfournisseur");
            exit();
          
        }
        // Controlleur aqui affiche la liste des fournisseurs
        public function afficherfournisseur(){
            $fournisseur = $this->fournisseurModel->listefournisseur();
            $_SESSION['fournisseur']= $fournisseur;
            header("location:./view/fournisseur.php");

        }

        public function editFournisseur($donnee){
            $this->fournisseurModel->modifierFournisseur($donnee['id'], $donnee['nom'], $donnee['prenom'],$donnee['adresse'],$donnee['telephone'],
            $donnee['email']);
            header("location: ./index.php?action=afficherfournisseur");
           }
        
        // Controller qui supprime un client avec un parametre id
       public function deleteEtudiant($id_client){
        $this->fournisseurModel->supprimerfournisseur($id_client);
        header('location:index.php');
       }
    }

?>

<?php 

require_once './model/clientModel.php';

    class clientController{
        private $clientModel;

        public function __construct() {
            $this->clientModel = new clientModel();
        }
        //  Conrolleur d'ajout d'un etudiant 
        public function addClient($donnee){
            $this->clientModel->ajouterClient($donnee['nom'], $donnee['prenom'],$donnee['adresse'],$donnee['telephone'],
            $donnee['email']);
            // Rediger vers la liste des clients
            // header("location: ./view/client.php");
            header("location: ./index.php?action=afficherclient");
            exit();
          
        }
        // Controlleur aqui affiche la liste des etudiants
        public function afficherClient(){
            $client = $this->clientModel->listeClient();
            $_SESSION['client']= $client;
            header("location:./view/Client.php");

        }
        public function afficherClientB(){
            $client = $this->clientModel->listeClientB();
            $_SESSION['clientB']= $client;
            header("location:./view/Client.php");

        }

        // Controller qui affiche le formulaire d'ajout d'un etudiant
        public function afficherFormulaireAjout(){
            require_once './views/ajoutEtudiant.php';
        }
        
        // Controller qui supprime un client avec un parametre id

    public function editClient($donnee){
        $this->clientModel->modifierClient($donnee['id'], $donnee['nom'], $donnee['prenom'],$donnee['adresse'],$donnee['telephone'],
        $donnee['email']);
        header("location: ./index.php?action=afficherclient");
        }

        public function deletClient($donnee){
            $this->clientModel->SuppressionClient($donnee);
            header("location: ./index.php?action=afficherclient");
            }
        
            public function onclockClient($donnee){
                $this->clientModel->DebloquerClient($donnee);
                header("location: ./index.php?action=afficherclient");
                }
    }

?>
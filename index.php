<?php
require_once './model/connexion.php';
require_once './model/admin.php';
require_once './controller/AuthController.php';
require_once './controller/logoutController.php';
require_once './model/produitModel.php';
require_once './controller/produitController.php';
require_once './model/clientModel.php';
require_once './controller/clientController.php';
require_once './model/venteModel.php';
require_once './controller/venteController.php';
require_once './model/recuModel.php';
require_once './controller/recuController.php';
require_once './model/fournisseurModel.php';
require_once './controller/fournisseurController.php';
require_once './model/commandeModel.php';
require_once './controller/commandeController.php';
require_once './model/categorieModel.php';
require_once './controller/categorieController.php';

// Connexion à la base de données
$db = Database::getConnexion();
$controllerProduit = new ProduitController();
$controllerClient = new clientController();
$controllerVente = new venteController();
$controllerRecu = new RecuController();
$controllerFournisseur = new fournisseurController();
$controllerCommande = new CommandeController();
$controllerCategorie = new CategorieController();
$logoutController = new LogoutController();

$action = isset($_GET['action'])? $_GET['action'] :null;

switch($action){
    case "login":
        // Instanciation du modèle Admin
        $adminModel = new Admin($db);

        // Instanciation du contrôleur AuthController
        $authController = new AuthController($adminModel);

        // Traitement du formulaire
        $resultat = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['conectee'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $resultat = $authController->login($email, $password);
            
        }
        // Inclure le formulaire de connexion
        include 'view/singin.php';
        break;
        case "logout":
            $logoutController->logout();
        break;

    case "inserer_produit":
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Ajout etudiant dans la BD
            $controllerProduit->addProduit($_POST);
            header("location: index.php?action=afficherproduit");
        }else{
            // Afficher le formulaire d'ajout
             //$controller->afficherFormulaireAjout();
        }
    break;
    
    // case "rechercheProduit":
    //     if($_SERVER['REQUEST_METHOD']== 'POST'){
    //         // Ajout etudiant dans la BD
    //         $controllerProduit->searchProduit($_POST);
    //         header("location: index.php?action=afficherproduit");
    //     }else{
    //         // Afficher le formulaire d'ajout
    //          //$controller->afficherFormulaireAjout();
    //     }
    // break;

    case "afficherproduit":

        $controllerCategorie->afficherCategorie();
        $controllerProduit->afficherproduit();
        header("location: view/article.php");
    break;

    case "modifier_produits":
        $controllerProduit->editProduit($_POST);
        // header("location:./view/article.php");
    break;

    case 'suppresionProduit':

        $id=isset($_GET['id'])  ? $_GET['id'] : null;
            if($id){
                //appel du controller qui supprime l'etudiant
                    $controllerProduit->deletePoduit($id);
            }
        break;

    case "afficherclient":
            $controllerClient ->afficherClientB();
            $controllerClient ->afficherClient();
             header("location: view/client.php");
    break;

    case "inserser_client":
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Ajout etudiant dans la BD
            $controllerClient->addClient($_POST);
            header("location: index.php?action=afficherclient");
        }else{
            // Afficher le formulaire d'ajout
             //$controller->afficherFormulaireAjout();
        }
    break;
    case "modifier_client":
        $controllerClient->editClient( $_POST);
        // header("location:./view/article.php");
    break;

    case "Supprimer_client":
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
            // Ajout etudiant dans la BD
            $controllerClient->deletClient( $_GET['id']);
           
    break;
    
    case "Debloquer_client":
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
            // Ajout etudiant dans la BD
            $controllerClient->onclockClient( $_GET['id']);
           
    break;

    case "inserer_vente":
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Ajout etudiant dans la BD
            $controllerVente->addVente($_POST);
            header("location: index.php?action=affichervente");
        }else{
            // Afficher le formulaire d'ajout
             //$controller->afficherFormulaireAjout();
        }
    break;

    case "affichervente":
        $controllerVente ->affichervente();
        $controllerClient ->afficherClient();
        $controllerProduit->afficherproduit();
        header("location: view/vente.php");
    break;

    case 'Annuler_vente':
        $id = isset($_GET['id'])  ? $_GET['id'] : null;
        $id_produit = isset($_GET['id_produit'])  ? $_GET['id_produit'] : null;
        $quantite = isset($_GET['quantite'])  ? $_GET['quantite'] : null;
            if($id){
                //appel du controller qui supprime l'etudiant
                    $controllerVente->cancelVente($id,$id_produit,$quantite );
                    header("location: index.php?action=affichervente");
            }
    break;
    
    case 'Afficher_recu':
        $id=isset($_GET['id'])  ? $_GET['id'] : null;
            if($id){
                //appel du controller qui supprime l'etudiant
                    $controllerRecu->afficherrecu($id);
                    header("location: view/recu.php");
            }
        break;

    case 'Afficher_Grand_recu':
            $id_client=isset($_GET['id_client'])  ? $_GET['id_client'] : null;
                if($id_client){
                    //appel du controller qui supprime l'etudiant
                        $controllerRecu->afficherGrandrecu($id_client);
                        header("location: view/GrandRecu.php");
                }
    break;
        case "afficherfournisseur":

            $controllerFournisseur ->afficherfournisseur();
             header("location: view/fournisseur.php");
    break;
    case "inserser_fournisseur":
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Ajout etudiant dans la BD
            $controllerFournisseur->addFournisseur($_POST);
            header("location: index.php?action=afficherfournisseur");
        }else{
            // Afficher le formulaire d'ajout
             //$controller->afficherFormulaireAjout();
        }
    break;

    case "modifier_fournisseur":
        $controllerFournisseur->editFournisseur( $_POST);
        // header("location:./view/article.php");
    break;

    case "afficherCommande":
        $controllerProduit->afficherproduit();
        $controllerFournisseur ->afficherfournisseur();
        $controllerCommande ->afficherCommande();
         header("location: view/commande.php");
    break;
    case "inserer_commande":
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Ajout etudiant dans la BD
            $controllerCommande->creerCommandeEtEnvoyerEmail($_POST);
            header("location: index.php?action=afficherCommande");
        }else{
            // Afficher le formulaire d'ajout
             //$controller->afficherFormulaireAjout();
        }
    break;
    case "Dashboad":
        $controllerVente ->affichervente();
        $controllerProduit->afficherproduit();
        $controllerFournisseur ->afficherfournisseur();
        $controllerCommande ->afficherCommande();
        $controllerProduit->DasboadProduits();
        $controllerVente ->DasboadLastVentes();
        $controllerVente ->DasboadMostVentes();
        $controllerVente ->DasboadVentes();
        $controllerVente ->DasboadCA();
        $controllerCommande ->DasboadCommandes();
        $controllerProduit->produitsLesPlusVendus();
         header("location: view/dashboard.php");
    break;
    case "afficherCategorie":

        $controllerCategorie->afficherCategorie();
        header("location: view/categorie.php");
    break;
    case "inserserCategorie":
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Ajout etudiant dans la BD
            $controllerCategorie->addCategorie($_POST);
            header("location: index.php?action=afficherCategorie");
        }else{
            // Afficher le formulaire d'ajout
             //$controller->afficherFormulaireAjout();
        }
    break;
    case "modifier_categorie":
        $controllerCategorie->editCategorie( $_POST);
        // header("location:./view/article.php");
    break;
    case "afficherAnalyse":
        $controllerVente ->affichervente();
        $controllerProduit->afficherproduit();
        $controllerFournisseur ->afficherfournisseur();
        $controllerCommande ->afficherCommande();
        $controllerVente->analyse();
        header("location: view/analyse.php");
    break;
    
    default : 
    header("location:index.php?action=login");
}


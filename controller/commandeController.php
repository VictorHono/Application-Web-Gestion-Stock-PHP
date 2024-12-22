<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './public/vendor/autoload.php';

require_once './model/produitModel.php';

    class commandeController {
        private $CommandeModel;

        public function __construct() {
            $this->CommandeModel = new commandeModel();
        }

        //  Conrolleur d'ajout d'un produit 
        public function addCommande($donnee){
            $this->CommandeModel->ajouterCommande($donnee['id_produit'], $_SESSION['bn2']=$donnee['id_fournisseur'],$donnee['quantite'],$donnee['prix']);
            // Rediger vers la liste des etudiants
            header("location: ./view/commande.php");
          
        }
        // Controlleur aqui affiche la liste des produits
        public function afficherCommande(){
            $Commande = $this->CommandeModel->listeCommande();
            $_SESSION['Commande'] = $Commande;
            header("location:./view/commande.php");
        }

        public function DasboadCommandes(){
            $ALLCommande = $this->CommandeModel->GetAllCommande();
            $_SESSION['ALLCommande'] = $ALLCommande;
            header("location:./view/dashboard.php");
        }
        // }

        // // Controller qui affiche le formulaire d'ajout d'un etudiant
        // public function afficherFormulaireAjout(){
        //     require_once './views/ajoutEtudiant.php';
        // }
        
    //     //Controller qui supprime un etudiant avec un parametre id
    //    public function cancelVente($id,$id_produit,$quantite){
    //     $this->venteModel->AnnulerVente($id,$id_produit,$quantite);
    //     header("location:./view/vente.php");
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
    public function creerCommandeEtEnvoyerEmail($donnee)
    {
        // Créer la commande dans la base de données
        if ($this->CommandeModel->ajouterCommande($donnee['id_produit'], $_SESSION['bn2']=$donnee['id_fournisseur'],$donnee['quantite'],$donnee['prix'])) {
            // Récupérer l'email du fournisseur
            $emailFournisseur = $this->CommandeModel->getFournisseurEmail($donnee['id_fournisseur']);
            $nomProduit = $this->CommandeModel->getProduitNom($donnee['id_produit']);

            if ($emailFournisseur) {
                // Envoyer un e-mail
                $this->envoyerEmail($emailFournisseur, $nomProduit, $donnee['quantite']);
            } else {
                echo "Erreur : Email du fournisseur introuvable.";
            }
        } else {
            echo "Erreur : Impossible de créer la commande.";
        }
    }

    private function envoyerEmail($email, $nomProduit, $quantite)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'honorefts@gmail.com'; // Votre email
            $mail->Password = 'itdc ymdx hsbh vnjd'; // Votre mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataire
            $mail->setFrom('honorefts@gmail.com', 'Admin Gestion Stocks');
            $mail->addAddress($email);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = "Commande de stock du produit $nomProduit";
            $mail->Body = "Bonjour,<br><br>Nous souhaitons commander le produit suivant :<br>
                          <strong>Nom du produit :</strong> $nomProduit<br>
                          <strong>Quantité :</strong> $quantite<br><br>
                          Cordialement,<br> VIC-GST.";

            $mail->send();
            echo '<script>
        alert("Mail envoyé et stock mis à jour avec succès !");
                    </script>';
            header("location: ./view/commande.php");
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    }

    }
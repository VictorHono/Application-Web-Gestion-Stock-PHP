<?php
class AuthController
{
    private $adminModel;

    public function __construct($adminModel)
    {
        $this->adminModel = $adminModel;
    }

    public function login($email, $password)
    {
        
        // Vérification de l'email
        if (!$this->adminModel->emailExists($email)) {
            return 'FAUX_EMAIL';
        }

        // Vérification du mot de passe
        if (!$this->adminModel->passwordMatches($email, $password)) {
            return 'FAUX_MDP';
        }

        if ($this->adminModel->emailExists($email) && $this->adminModel->passwordMatches($email, $password)) {
            session_start();

            $admin=$this->adminModel->tout($email, $password);
            // Connexion réussie
            $_SESSION['admin_id'] = $admin["id_admin"];
            $_SESSION['admin_role'] = $admin['role'];
            $_SESSION['admin_nom'] = $admin['nom'];
            $_SESSION['admin_email'] = $admin['email'];
            header('location: ./index.php?action=Dashboad');
        }
    }
}
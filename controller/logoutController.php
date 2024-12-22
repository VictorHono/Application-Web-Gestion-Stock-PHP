<?php

class LogoutController {
    public function logout() {
        session_start();

        // Vérifiez si une session existe, puis la détruisez
        if (isset($_SESSION['admin_id'])) {
            session_unset(); // Supprime toutes les variables de session
            session_destroy(); // Détruit la session
        }

        // Redirection vers la page de connexion
        header("Location: ./index.php");
        exit();
    }
}



<?php

class Admin
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    // Vérification de l'existence de l'email
    public function emailExists($email)
    {
        $query = "SELECT EXISTS(SELECT 1 FROM Admin WHERE email = :email) as exists_email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['exists_email'] == 1;
    }

    // Vérification de l'existence du mot de passe pour un email donné
    public function passwordMatches($email, $password)
    {
        $query = "SELECT EXISTS(SELECT 1 FROM Admin WHERE email = :email AND password = :password) as exists_password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['exists_password'] == 1;

        
    }

    public function tout($email, $password)
    {
        $sql = $this->conn->prepare("SELECT * FROM admin WHERE `email` = :email AND `password` = :password ");
        $sql->bindParam(":email", $email);
        $sql->bindParam(":password", $password);
        $sql->execute();
        $resultat = $sql->fetch();
        return $resultat;
    }


    function logout()
{
    session_unset(); // Supprimer toutes les variables de session
    session_destroy(); // Détruire la session
}
}

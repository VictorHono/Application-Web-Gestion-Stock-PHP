<?php 

class Database {
    private static $instance = null;
    private $conn;
    // Les parametres de connexion au serveurs
    private $host = "localhost";
    private $dbname = "gestion_stocks";
    private $userName = "root";
    private $password = "";

    private function __construct()
    {
        try {
            $this->conn = new PDO ("mysql:host={$this->host};dbname={$this->dbname}", 
            $this->userName, $this->password);  
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }catch(PDOException $e){
              die("Erreur de connexion a la base de donne :" .$e->getMessage());
          }
        }
    
            public static function getConnexion(){
                // si null ouvre la connexion 
                if (self::$instance == null){
                    self::$instance = new Database();
                    // si on utilise la connexion qui existe deja 
                }
                
                return self::$instance->conn;
            }

}
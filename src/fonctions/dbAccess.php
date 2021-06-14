<?php 
    // Fonction pour log dans la bdd
    function connectDB(){
        try {
            static $pdo;
            $dsn = "mysql:host=localhost;dbname=blog-gaming;charset=utf8";
            $options = [PDO::ATTR_ERRMODE    => PDO::ERRMODE_WARNING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ];  
            $pdo = new PDO($dsn,"root","",$options);
            if(!$pdo){
                throw new Exception("\nPDO::errorInfo():\n", 1);
                return false;
            } 
            return $pdo;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
        
    }


?>
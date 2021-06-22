<?php 
    // Fonction pour log dans la bdd
    function connectDB(){
        try {
            static $pdo;
            $dsn = "mysql:host=localhost;dbname=blog-gaming;charset=utf8";  
            $pdo = new PDO($dsn,"root","");
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
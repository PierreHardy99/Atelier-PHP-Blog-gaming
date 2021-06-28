<?php 

    function getUser(){
        $pdo = connectDB();
        $requete = $pdo->query('SELECT * from users u 
                                INNER JOIN role r ON u.roleId = r.roleId') or die(print_r($requete->errorInfo(), TRUE));
        if ($requete == false) {
            echo 'Erreur';
            return false;
        }

        while ($données = $requete->fetch()) {
            $listeUser[] = $données;
        }
        $requete->closeCursor();
        return $listeUser;
    }

    function getUserbyId($id){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT * from users u 
                                  INNER JOIN role r ON u.roleId = r.roleId 
                                  where userId = ?') or die(print_r($requete->errorInfo(), TRUE));
        $requete->execute(array($id));
        if ($requete == false) {
            echo 'Erreur';
            return false;
        }

        while ($données = $requete->fetch()) {
            $listeUser[] = $données;
        }
        $requete->closeCursor();
        if (isset($listeUser)) {
            return $listeUser;
        }
        
    }

?>
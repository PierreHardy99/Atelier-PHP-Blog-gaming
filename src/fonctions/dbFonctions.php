<?php
    // Enregister un nouvel utilisateur dans notre base de donnée

    function createUser($avatar,$login,$nom,$prenom,$email,$mdp,$roleId,$ban){
        $bdd = new PDO("mysql:host=localhost;dbname=blog-gaming;charset=utf8","root","");
        $requete = $bdd->prepare("INSERT INTO users(avatar,login,nom,prenom,email,mdp,roleId,ban)
                                VALUES(?,?,?,?,?,?,?,?)");
        $requete->execute(array($avatar,$login,$nom,$prenom,$email,$mdp,$roleId,$ban)) or die(print_r($requete->errorInfo(), true));
        $requete->closeCursor(); // Ferme la connexion à la base de donnée
    }
?>
<?php
    require '../../src/fonctions/dbAccess.php';
    // Enregister un nouvel utilisateur dans notre base de donnée
    function createUser($avatar,$login,$nom,$prenom,$email,$mdp,$roleId,$ban){
        $pdo = connectDB();
        $requete = $pdo->prepare("INSERT INTO users(avatar,login,nom,prenom,email,mdp,roleId,ban)
                                VALUES(?,?,?,?,?,?,?,?)");
        $requete->execute(array($avatar,$login,$nom,$prenom,$email,$mdp,$roleId,$ban)) or die(print_r($requete->errorInfo(), true));
        $requete->closeCursor(); // Ferme la connexion à la base de donnée
    }

    // Fonction pour se connecter au site
    function login($user, $password){
        // connection à la db
        $pdo = connectDB();
        // requete pour récupérer l'user correspondant au login entré
        $requete = $pdo->query('SELECT * 
                                FROM users u 
                                INNER JOIN role r ON r.roleId = u.roleId;') or die(print_r($requete->errorInfo(), TRUE));   

        // Traitement de la requete
        while($result = $requete->fetch()){
            if($result["login"] == $user){
                // sel du mdp envoyé avec le sel contenu dans la colonne ban
                $sel = md5($password) . $result["ban"];

                //J'active ma session user avec les infos dont je pourrai avoir besoin
                // tant que mon utilisateur est connecté 
                if($result["mdp"] == $sel){
                    $_SESSION["connect"] = true;
                    $_SESSION["user"] = [
                        "id" => $result["userId"],
                        "nom" => $result["nom"],
                        "prenom" => $result["prenom"],
                        "photo" => $result["avatar"],
                        "login" => $result["login"],
                        "email" => $result["email"],
                        "role" => $result["nomRole"]
                    ];
                    // J'active la session connecté
                    $_SESSION["connecté"] = true;
                    // Je redirige vers la page account
                    header("location: ../../src/pages/account.php");
                    exit();
                }
                else{
                    header("location: ../../src/pages/login.php?erreur=Mot de passe incorrect");
                    exit();
                }
            }
        }
        // Si mon script arrive ici, il est sorti de ma boucle sans trouver de user
        header("location: ../../src/pages/login.php?erreur=Identifiant inconnu, veuillez recommencer!");
        exit();
    }

    function updateImg($fichier){
        $pdo = connectDB();
        // Preparer la requete pour update données
        $requete = $pdo->prepare("UPDATE users
                                SET avatar = ?
                                WHERE userId = ? ");

        $requete->execute(array($fichier,$_SESSION["user"]["id"])) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

    // Fonction pour aller chercher la liste des categorie
    function getHardCategorie(){
        $pdo = connectDB();
        $requete = $pdo->query('SELECT * FROM hardware') or die(print_r($requete->errorInfo(), TRUE));

        // Distribuer les données recue dans une variable tableau
        while ($données = $requete->fetch()) {
            $listeHardCategorie[] = $données;
        }
        $requete->closeCursor();

        return $listeHardCategorie;
    }

    // Ajouter une console
    function addHardCategorie($console){
        $pdo = connectDB();
        $requete = $pdo->prepare('INSERT INTO hardware(console) VALUES (?)');
        $requete->execute(array($console));
        $requete->closeCursor();
    }

    function deleteHardCategorie($delConsole){
        $pdo = connectDB();
        $requete = $pdo->prepare('DELETE FROM hardware WHERE hardId = ?');
        $requete->execute(array($delConsole)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

    // Categorie type article
    // Chercher touts les types d'article
    function getCategorie(){
        $pdo = connectDB();
        $requete = $pdo->query('SELECT * FROM categorie');
        while ($données = $requete->fetch()){
            $listCategorie[] = $données;
        }
        $requete->closeCursor();
        return $listCategorie;
    }
    // Ajouter un type d'article
    function addTypeArticle($typeArticle){
        $pdo = connectDB();
        $requete = $pdo->prepare("INSERT INTO categorie(nomCategorie) VALUES (?)");
        $requete->execute(array($typeArticle)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }
    // Effacer type d'article
    function deleteTypeCategorie($intDeleteType){
        $pdo = connectDB();
        $requete = $pdo->prepare('DELETE FROM categorie WHERE categorieId = ?');
        $requete->execute(array($intDeleteType)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

    // Categorie game
    // Chercher toutes les catégorie
    function getGameCategorie(){
        $pdo = connectDB();
        $requete = $pdo->query("SELECT * FROM gameCategory") or die(print_r($requete->errorInfo(), TRUE));
        while ($données = $requete->fetch()) {
            $listeGameCat[] = $données;
        }

        $requete->closeCursor();
        return $listeGameCat;
    }
    // Ajouter une categorie de jeux
    function addGameCategorie($gameCat){
        $pdo = connectDB();
        $requete = $pdo->prepare("INSERT INTO gameCategory(genre) VALUES ?");
        $requete->execute(array($gameCat));
        $requete->closeCursor();

    }
    function deleteGameCategorie($id){
        $pdo = connectDB();
        $requete = $pdo->prepare('DELETE FROM gameCategory WHERE gameCategoryId = ?');
        $requete->execute(array($id)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }
?>
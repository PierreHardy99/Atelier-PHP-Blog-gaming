<?php
    require '../../src/fonctions/dbAccess.php';
    // Enregister un nouvel utilisateur dans notre base de donnée
    function createUser($avatar,$login,$nom,$prenom,$email,$mdp,$roleId,$ban,$clef,$actif){
        $pdo = connectDB();
        $requete = $pdo->prepare("INSERT INTO users(avatar,login,nom,prenom,email,mdp,roleId,ban,clef,actif)
                                VALUES(?,?,?,?,?,?,?,?,?,?)");
        $requete->execute(array($avatar,$login,$nom,$prenom,$email,$mdp,$roleId,$ban,$clef,$actif)) or die(print_r($requete->errorInfo(), true));
        $requete->closeCursor(); // Ferme la connexion à la base de donnée
    }

    function getConsoleNav(){
        $pdo = connectDB();
        $requete = $pdo->query('SELECT * from hardware') or die(print_r($requete->errorInfo(), TRUE));
        while ($données = $requete->fetch()) {
            $listeConsole[] = $données; 
        }
        $requete->closeCursor();
        return $listeConsole;
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
                // On vérifie que l'user n'est pas ban
                if (isset($result["ban"]) && !empty($result["ban"])) {
                    if ($result['actif'] == 1 ) {
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
                    } else {
                        header("location: ../../src/pages/login.php?erreur=Votre compte n'est pas activé, veuillez l'activez !");
                        exit();
                    }
                } else {
                    header("location: ../../src/pages/login.php?erreur=Votre compte a été suspendu !");
                    exit();
                }
                
            }
        }
        $requete->closeCursor();
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

    function verif($user){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT userId,clef, actif FROM users WHERE login = ?');
        $requete->execute(array($user));
        while ($données = $requete->fetch()) {
            $user = $données;
        }
        $requete->closeCursor();
        return $user;
    }

    function actifAccount($id){
        $pdo = connectDB();
        $requete = $pdo->prepare('UPDATE users
                                  SET actif = 1, clef = 0
                                  WHERE userId = ?');
        $requete->execute(array($id));
        $requete->closeCursor();
    }

?>
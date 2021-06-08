<?php
    // Fonction pour log dans la bdd
    function connectDB(){
        static $pdo;
        $dsn = "mysql:host=localhost;dbname=blog-gaming;charset=utf8";
        $options = [PDO::ATTR_ERRMODE    => PDO::ERRMODE_WARNING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ];  
        $pdo = new PDO($dsn,"root","",$options);
        if(!$pdo){
            echo "\nPDO::errorInfo():\n";
            return false;
        } else {
            return $pdo;
        }
    }

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
?>
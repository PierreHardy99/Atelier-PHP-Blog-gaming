<?php 
    $titre = "Enregistez-vous";
    require "../../src/common/template.php";
    require "../../src/fonctions/mesFonctions.php";
    require "../../src/fonctions/dbFonctions.php";

    // si mon user est connecté, je le renvoie sur la page d'accueil grace à ma fonction
    estConnecte();

    // Définir la variable qui marquera si le mot de passe est correct ou pas
    (isset($_SESSION["mdpNoOk"]) && $_SESSION["mdpNoOk"] == true)? $mdpNoOk = $_SESSION["mdpNoOk"] : $mdpNoOk = false;

    // Verifier si les inputs sont bien présent(et donc que ma méthode POST à été déclenchée)
    if (isset($_POST['nom']) && !empty($_POST["nom"]) && !empty($_POST["login"])&& !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp2"])) {

        // Si l'avatar du user est vide, j'utiliseri l'avatar par défaut
        $photo = "../../src/img/site/defaut_avatar.png";

        // Sanétiser mes données
        // Je construit un tableau avec les données recues
        $option = array(
            "nom"   =>  FILTER_SANITIZE_STRING,
            "prenom"   =>  FILTER_SANITIZE_STRING,
            "login"   =>  FILTER_SANITIZE_STRING,
            "email"   =>  FILTER_VALIDATE_EMAIL,
            "mdp"   =>  FILTER_SANITIZE_STRING,
            "mdp2"   =>  FILTER_SANITIZE_STRING
        );

        // Créer une variable result qui va accueillir les données saines

        $result = filter_input_array(INPUT_POST,$option);

        $nom = $result["nom"];
        $prenom = $result["prenom"];
        $login = $result["login"];
        $email = $result["email"];
        $mdp = $result["mdp"];
        $mdp2 = $result["mdp2"];
        $role = 4;

        // verifier si mot de passe sont identiques 
        if ($mdp == $mdp2) {
            // hash du mot de passe
            $mdpHash = md5($mdp);
            // générer grain de sel
            $sel = grainDeSel(rand(5,20));
            // mot de passe à envoyer
            $mdpToSend = $mdpHash . $sel;
            $mdpNoOk = false;
        } else {
            // boolean de contrôle
            $mdpNoOk = true;
            //  j'active une seession pour indiquer que les mdp sont noOk
            $_SESSION["mdpNoOk"] = true;
            // Je recharge ma page
            header("location: ../../src/pages/register.php");
            exit();
        }
        // Vérifier si le login ou le mail n'est pas présent dans ma db
        $bdd = new PDO("mysql:host=localhost;dbname=blog-gaming;charset=utf8","root","");
        // Check login
        $requete = $bdd->prepare("SELECT COUNT(*) AS x
                                    FROM users
                                    WHERE login = ?");
        $requete->execute(array($login));

        while ($result = $requete->fetch()) {
            if ($result["x"] != 0) {
                $_SESSION["msgLogin"] = true;
                header("location: ../../src/pages/register.php");
                exit();
            }
        }

        // Check mail
        $requete = $bdd->prepare("SELECT COUNT(*) AS x
                                    FROM users
                                    WHERE email = ?");
        $requete->execute(array($email));

        while ($result = $requete->fetch()) {
            if ($result["x"] != 0) {
                $_SESSION["msgEmail"] = true;
                header("location: ../../src/pages/register.php");
                exit();
            }
        }

        // Verifier si user a envoyé photo et agit en conséquence
        if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == 0) {
            $photo = sendImg($_FILES["fichier"], "avatar");
        }

        // Mes données sont correctes, elles sont saines, je peux créer mon user
        createUser($photo, $login, $nom, $prenom, $email, $mdpToSend, $roleId, $sel);

        // Tout s'est bien passé, invite user à se connecter
?>
    <h2 class="registerOk">Votre compte est maintenant créé, vous pouvez vous <a href="../../src/pages/login.php">CONNECTER</a></h2>
<?php

    } else {
        
?>


<section class="register">
    <form action="" method="post" class="login" enctype="multipart/form-data">
    <?php 
        // Si les boolean de checkmail est true, afficher information pour inviter à connecter
        if (isset($_SESSION["msgEmail"]) && $_SESSION["msgEmail"] == true) {
            echo "<h2>Cet email possède déjà un compte, veuillez vous connecter</h2>";
            $_SESSION["msgEmail"] = false;
        }
        // Si les boolean de checklogin est true, afficher information pour inviter à connecter
        if (isset($_SESSION["msgLogin"]) && $_SESSION["msgLogin"] == true) {
            echo "<h2>Ce login possède déjà un compte, veuillez vous connecter</h2>";
            $_SESSION["msgLogin"] = false;
        }
        
    ?>
        <table>
            <thead>

                <tr>
                    <th colspan="2">Créez votre compte</th>
                </tr>
        
            </thead>
            <tbody>

                <tr>
                    <td>Prénom:</td>
                    <td><input type="text" name="prenom" require placeholder="Entrez votre prénom"></td>
                </tr>

                <tr>
                    <td>Nom:</td>
                    <td><input type="text" name="nom" require placeholder="Entrez votre nom"></td>
                </tr>

                <tr>
                    <td>Login:</td>
                    <td><input type="text" name="login" require placeholder="Entrez votre login"></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" require placeholder="Entrez votre email"></td>
                </tr>

                <tr>
                    <td>Mot de passe:</td>
                    <td><input type="password" name="mdp" require placeholder="Entrez votre mot de passe" <?php if($mdpNoOk == true){?> class="danger" placeholder="Les mot de passes ne sont pas identiques !"<?php }?>></td>
                </tr>

                <tr>
                    <td>Mot de passe:</td>
                    <td><input type="password" name="mdp2" require placeholder="Répétez votre mot de passe" <?php if($mdpNoOk == true){?> class="danger" placeholder="Les mot de passes ne sont pas identiques !"<?php }?>></td>
                </tr>

                <tr>
                    <td>Envoyez votre avatar</td>
                    <td><input type="file" name="fichier"></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Créer votre compte"></td>
                </tr>
        
            </tbody>
        </table>
    </form>
</section>

<?php
    }
    require "../../src/common/footer.php";
?>
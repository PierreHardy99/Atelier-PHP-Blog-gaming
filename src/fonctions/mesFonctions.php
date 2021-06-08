<?php

    // Je crée ma fonction grain de sel qui va générer une chaine aléatoire que l'on rajoutera
    // au hash du mot de passe pour compléxifier sa décryption par un éventuel hackeur.
    function grainDeSel($x){
        // Je crée une variable qui contiendra les caractères qui peuvent composer un hash md5
        $chars = "0123456789abcdef";
        $string = "";
        // Je crée une boucle qui va choisir une série de x caractère
        // le x étant le paramètre de ma fonction qui sera lui aussi généré aléatoirement
        for ($i=0; $i < $x; $i++) { 
            $string .= $chars[rand(0,strlen($chars)-1)];
        }
        return $string;
    }

    // Fonction pour envoyer une image qui prendra en compte l'endroit ou sera envoyé l'upload selon
    // que ce soit un avatar ou pour un article

    function sendImg($photo,$destination){
        if ($destination == "avatar") {
            $dossier = "../../src/img/avatar";
        } else {
            $dossier = "../../src/img/article";
        }

        // Créer un tableau avec les extensions autorisée
        $extensionArray = ["png","jpg","jpeg","jfif","PNG","JPG","JPEG","JFIF"];
        // Récupérer toutes les infos du fichier envoyé
        $infoFichier = pathinfo($photo["name"]);
        // Je récupère l'extension du fichier envoyé
        $extensionImage = $infoFichier["extension"];

        // Extension autorisée ?
        if (in_array($extensionImage, $extensionArray)) {
            // Préparer le chemin répertoire + nom fichier
            $dossier.=basename($photo["name"]);
            // Envoyer mon fichier
            move_uploaded_file($photo["tmp_name"], $dossier);
        }
        return $dossier;
    }

    // fonction pour savoir si un user est connecté ou non
    function estConnecte(){
        if (isset($_SESSION["connecté"]) && $_SESSION["connecté"] == true) {
            header("location: ../../index.php");
        }
    }
?>
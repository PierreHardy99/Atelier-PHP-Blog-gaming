<?php 
    
    function envoyerArticle($titre,$imgUrl,$content,$date,$categorieId,$gameCategoryId,$auteurId,$gameId,$hardId,$star){
        //Traitement de l'image envoyée
        $traiterImage = sendImg($imgUrl, "article");

        //Récuperer l'id de la catégorie d'article qui correspond à la selection de l'auteur
        $arrayCategorieId = getTypeArticleByName($categorieId);
        //J'envoie l'index récupéré dans une nouvelle variable
        $categorieId = intval($arrayCategorieId[0][0]);

        // Récuperer id catégorie
        $arrayGameCategoryId = getGameCategoryByName($gameCategoryId);
        $gameCategoryId = intval($arrayGameCategoryId[0][0]);
        
        //Récuperer l'id du jeu
        $arrayGameName = getGameByName($gameId);
        $gameId = intval($arrayGameName[0][0]);

        // Récupérer l'id HArdware
        $arrayHardware = getHardByNAme($hardId);
        $hardId = intval($arrayHardware[0][0]);

        // Envoyer article dans db
        $pdo = connectDB();
        $requete = $pdo->prepare('INSERT INTO articles(titre, imgUrl, content, date, categorieId, gameCategorieId, auteurId, gameId, hardId, star)
                                  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $requete->execute(array($titre, $traiterImage, $content, $date, $categorieId, $gameCategoryId, $auteurId, $gameId, $hardId, $star)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
        // Vérifier si star est actif ou pas
        if ($star == 1) {
            // Envoyer l'article à la une dans la table star
            aLaUne($titre);
        }
    }

    function aLaUne($valeur){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT articleId FROM articles WHERE titre = ?');
        $requete->execute(array($valeur)) or die(print_r($requete->errorInfo(), TRUE));
        
        while ($données = $requete->fetch()) {
            $articleId = $données[0];
            $intArticleId = intval($articleId);
        }
        
        $requete = $pdo->prepare('INSERT INTO stars(articleId) VALUES(?)');
        $requete->execute(array($intArticleId)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }
?>
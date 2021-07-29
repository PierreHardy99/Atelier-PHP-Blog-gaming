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

    function getTop(){
        $pdo = connectDB();
        $requete = $pdo->query('SELECT a.articleId, a.titre, a.imgUrl, a.content, a.date, c.nomCategorie, gc.genre, u.nom, u.prenom
                                  FROM articles a
                                  INNER JOIN categorie c ON c.categorieId = a.categorieId
                                  INNER JOIN gameCategory gc ON gc.gameCategoryId = a.gameCategorieId
                                  INNER JOIN users u ON u.userId = a.auteurId
                                  INNER JOIN jeux j ON j.gameId = a.gameId
                                  INNER JOIN hardware h ON h.hardId = a.hardId
                                  INNER JOIN stars s ON s.articleId = a.articleId
                                  WHERE s.articleId = a.articleId
                                  ORDER BY starId DESC');
        while($données = $requete->fetch()){
            $listOnTop[] = $données;
        }
        $requete->closeCursor();
        if (isset($listOnTop)) {
            return $listOnTop;
        }
        
    }

    function getArticle(){
        $pdo = connectDB();
        $requete = $pdo->query("SELECT * FROM articles") or die(print_r($requete->errorInfo(), TRUE));
        while($données = $requete->fetch()){
            $listeArticle[] = $données;
        }
        $requete->closeCursor();
        return $listeArticle;
    }

    function getArticleByHard($console){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT * FROM articles WHERE hardId = ?');
        $requete->execute(array($console)) or die(print_r($requete->errorInfo(), TRUE));

        while ($données = $requete->fetch()) {
            $listeArticleByHard[] = $données;
        }
        $requete->closeCursor();
        if (isset($listeArticleByHard)) {
            return $listeArticleByHard;
        }
    }

    function getArticleForAccount($id){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT * from articles WHERE auteurId = ?');
        $requete->execute(array($id)) or die(print_r($requete->errorInfo(), TRUE));
        while ($données = $requete->fetch()) {
            $listeCommentaire[] = $données;
        }
        $requete->closeCursor();
        if (isset($listeCommentaire)) {
            return $listeCommentaire;
        }
        
    }

    function getArticleAdmin(){
        $pdo = connectDB();
        $requete = $pdo->query('SELECT a.articleId, a.titre, a.imgUrl,a.content, a.date,c.nomCategorie,gc.genre, u.nom,u.prenom,j.nom AS jeu,h.console,a.star
                                  FROM articles a
                                  INNER JOIN categorie c ON c.categorieId = a.categorieId
                                  INNER JOIN gameCategory gc ON gc.gameCategoryId = a.gameCategorieId
                                  INNER JOIN users u ON u.userId = a.auteurId
                                  INNER JOIN jeux j ON j.gameId = a.gameId
                                  INNER JOIN hardware h ON h.hardId = a.hardId') or die(print_r($requete->errorInfo(), TRUE));
        while ($données = $requete->fetch()) {
            $listeArticle[] = $données; 
        }
        $requete->closeCursor();
        if (isset($listeArticle)) {
            return $listeArticle;
        }
        
    }

    function delArticle($id){
        $pdo = connectDB();
        $requete = $pdo->prepare('DELETE FROM articles WHERE articleId = ?');
        $requete->execute(array($id)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }
?>
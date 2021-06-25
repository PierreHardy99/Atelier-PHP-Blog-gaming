<?php 

    //
    function getArticleOnTop(){
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
                                  ORDER BY starId DESC LIMIT 3');
        while($données = $requete->fetch()){
            $listOnTop[] = $données;
        }
        return $listOnTop;
    }

    function getLastArticle(){
        $pdo = connectDB();
        $requete = $pdo->query('SELECT a.articleId, a.titre, a.imgUrl, a.content, a.date, c.nomCategorie, gc.genre, u.nom, u.prenom
                                  FROM articles a
                                  INNER JOIN categorie c ON c.categorieId = a.categorieId
                                  INNER JOIN gameCategory gc ON gc.gameCategoryId = a.gameCategorieId
                                  INNER JOIN users u ON u.userId = a.auteurId
                                  INNER JOIN jeux j ON j.gameId = a.gameId
                                  INNER JOIN hardware h ON h.hardId = a.hardId
                                  ORDER BY a.articleId DESC LIMIT 12');
        while($données = $requete->fetch()){
            $listLastArticle[] = $données;
        }
        return $listLastArticle;
    }
    
?>
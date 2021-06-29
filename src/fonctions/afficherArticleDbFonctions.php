<?php 
    // Rechercher un article à afficher par son id
    function getArticleContent($id){
        $pdo = connectDB();
        $requete = $pdo->prepare("SELECT a.titre, a.imgUrl, a.content, a.date, c.nomCategorie, gc.genre, 
        u.nom AS auteurNom, u.prenom AS auteurPrenom, j.nom, j.developpeur, j.editeur, j.dateDeSortie, j.cover, h.console 
                                  FROM articles a
                                  INNER JOIN categorie c ON c.categorieId = a.categorieID
                                  INNER JOIN gamecategory gc ON gc.gameCategoryId = a.gameCategorieId
                                  INNER JOIN users u ON u.userId = a.auteurId
                                  INNER JOIN jeux j ON j.gameId = a.gameId
                                  INNER JOIN hardware h ON h.hardId = a.hardId
                                  WHERE a.articleId = ?");
        $requete->execute(array($id))or die(print_r($requete->errorInfo(), TRUE));
        while($données = $requete->fetch()){
            $contenuArticle[] = $données;
        }
        $requete->closeCursor();
        
        // Si l'id envoyé par le user existe, je retourne les données recues par la requete
        if ($contenuArticle) {
            return $contenuArticle;
        } else {
            // Si je n'ai rien reçu, l'id de l'article n'existe pas, j'envoie  vers la page d'erreur
            header('location: ../../index.php?error=true&message=Le lien suivi n\'existe pas, retour à la case départ');
        }
    }

?>
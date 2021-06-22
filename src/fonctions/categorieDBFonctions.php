<?php 
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
        $requete = $pdo->prepare("INSERT INTO gameCategory(genre) VALUES (?)");
        $requete->execute(array($gameCat)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();

    }
    function deleteGameCategorie($id){
        $pdo = connectDB();
        $requete = $pdo->prepare('DELETE FROM gameCategory WHERE gameCategoryId = ?');
        $requete->execute(array($id)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

    // Chercher une categorie d'article par genre pour récupérer son ID
    function getTypeArticleByName($categorieId){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT categorieId FROM categorie
                                  WHERE nomCategorie = ?');
        $requete->execute(array($categorieId)) or die(print_r($requete->errorInfo(), TRUE));

        while ($données = $requete->fetch()) {
            $listeCategorie[] = $données;
        }
        $requete->closeCursor();
        return $listeCategorie;
    }

    // Chercher une categorie de jeu par son nom
    function getGameCategoryByName($valeur){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT gameCategoryId FROM gameCategory WHERE genre = ?');
        $requete->execute(array($valeur)) or die(print_r($requete->errorInfo(), TRUE));

        while ($données = $requete->fetch()) {
            $gameCategoryId[] = $données;
        }
        $requete->closeCursor();
        return $gameCategoryId;
    }
?>
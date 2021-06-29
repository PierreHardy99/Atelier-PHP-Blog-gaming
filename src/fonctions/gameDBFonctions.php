<?php 
    // Recherche tout les jeux
    function getGame(){
        $pdo = connectDB();
        $requete = $pdo->query("SELECT * FROM jeux j 
                                INNER JOIN hardware h ON j.consoleId = h.hardId
                                INNER JOIN gameCategory g ON j.gameCategoryId = g.gameCategoryId") or die(print_r($requete->errorInfo(), TRUE));

        $listGame = $requete->fetchAll();
        $requete->closeCursor();
        return $listGame;
    }
    // Rechercher toutes les genres
    function getGameCategory(){
        $pdo = connectDB();
        $requete = $pdo->query("SELECT * FROM gameCategory") or die(print_r($requete->errorInfo(), TRUE));

        while ($données = $requete->fetch()) {
            $listGameCat[] = [$données["gameCategoryId"], $données["genre"]];
        }
        $requete->closeCursor();
        return $listGameCat;
    }
    // Rechercher toutes les consoles
    function getHardware(){
        $pdo = connectDB();
        $requete = $pdo->query("SELECT * FROM hardware") or die(print_r($requete->errorInfo(), TRUE));

        while ($données = $requete->fetch()) {
            $listHard[] = [$données["hardId"], $données["console"]];
        }
        $requete->closeCursor();
        return $listHard;
    }
    // Ajouter le jeu
    function AddGame($nom,$console,$gameCat,$dev,$edit,$dateDeSortie,$cover){
        $pdo = connectDB();
        $requete = $pdo->prepare("INSERT INTO jeux(nom,consoleId,gameCategoryId,developpeur,editeur,dateDeSortie,cover) VALUE (?,?,?,?,?,?,?)");
        $requete->execute(array($nom,$console,$gameCat,$dev,$edit,$dateDeSortie,$cover)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }
    // Supprimer le jeu
    function deleteGame($id){
        $pdo = connectDB();
        $requete = $pdo->prepare("DELETE FROM jeux WHERE gameId = ?");
        $requete->execute(array($id)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }
    // Rechercher un nom dans la table jeu
    function getGameByName($gameId){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT gameId FROM jeux WHERE nom = ?');
        $requete->execute(array($gameId)) or die(print_r($requete->errorInfo(), TRUE));
        while ($données = $requete->fetch()) {
            $idJeux[] = $données;
        }
        $requete->closeCursor();
        return $idJeux;
    }

    // Function pouyr retrouver une console par son nom
    function getHardByName($valeur){
        $pdo = connectDB();
        $requete = $pdo->prepare('SELECT hardId FROM hardware WHERE console = ?');
        $requete->execute(array($valeur)) or die(print_r($requete->errorInfo(), TRUE));
        while ($données = $requete->fetch()) {
            $idHardware[] = $données;
        }
        $requete->closeCursor();
        return $idHardware;
    }
?>
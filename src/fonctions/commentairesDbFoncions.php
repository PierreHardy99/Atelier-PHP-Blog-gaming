<?php 

function envoyerCommentaires($articleId,$auteurId,$pseudo,$dateCommentaire,$commentaire){
    $pdo = connectDB();
    $requete = $pdo->prepare("INSERT INTO commentaires(articleId,auteurId,pseudo,dateCommentaire,contenu)
                              VALUES (?,?,?,?,?)");
    $requete->execute(array($articleId,$auteurId,$pseudo,$dateCommentaire, $commentaire)) or die(print_r($requete->errorInfo(), TRUE));
    $requete->closeCursor();
    header('location: ../../src/common/pageArticle.php?id=$articleId');
    exit();
}

function getAvatar($userId){
    $pdo = connectDB();
    $requete = $pdo->prepare('SELECT avatar FROM users u where userId = ?');
    $requete->execute(array($userId)) or die(print_r($requete->errorInfo(), TRUE));
    while ($données = $requete->fetch()) {
        $listeAvatar = $données[0]; 
    }
    $requete->closeCursor();
    return $listeAvatar;
}

function getCommentaire($articleId){
    $pdo = connectDB();
    $requete = $pdo->prepare('SELECT * FROM commentaires WHERE articleId = ? ORDER BY dateCommentaire') or die(print_r($requete->errorInfo(), TRUE));
    $requete->execute(array($articleId));
    if ($requete == false) {
        echo 'Erreur dans la recherche';
        exit();
    }
    while ($données = $requete->fetch()) {
        $listeCommentaire[] = $données; 
    }
    $requete->closeCursor();
    if (isset($listeCommentaire)) {
        return $listeCommentaire;
    }
    
}

?>
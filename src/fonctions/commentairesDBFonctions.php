<?php 

function envoyerCommentaires($articleId,$auteurId,$pseudo,$dateCommentaire,$commentaire){
    $pdo = connectDB();
    $requete = $pdo->prepare("INSERT INTO commentaires(articleId,auteurId,pseudo,dateCommentaire,contenu)
                              VALUES (?,?,?,?,?)");
    $requete->execute(array($articleId,$auteurId,$pseudo,$dateCommentaire, $commentaire)) or die(print_r($requete->errorInfo(), TRUE));
    if ($requete == false) {
        echo 'erreur dans la recherche';
        var_dump($requete);
        var_dump($articleId);
        exit();
    }
    $requete->closeCursor();
}

function getAvatar($userId){
    $pdo = connectDB();
    $requete = $pdo->prepare('SELECT avatar FROM users where userId = ?');
    $requete->execute(array($userId)) or die(print_r($requete->errorInfo(), TRUE));
    while ($données = $requete->fetch()) {
        $listeAvatar = $données[0]; 
    }
    $requete->closeCursor();
    return $listeAvatar;
}

function getCommentaire(){
    $pdo = connectDB();
    $requete = $pdo->query('SELECT * FROM commentaires c') or die(print_r($requete->errorInfo(), TRUE));
    if ($requete == false) {
        echo 'Erreur dans la recherche';
        exit();
    }
    while ($données = $requete->fetch()) {
        $listeCommentaire[] = $données; 
    }
    $requete->closeCursor();
    return $listeCommentaire;
}

function getCommentaireById($articleId){
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

function getCommentaireForAccount($id){
    $pdo = connectDB();
    $requete = $pdo->prepare('SELECT * FROM commentaires WHERE auteurId = ?') or die(print_r($requete->errorInfo(), TRUE));
    $requete->execute(array($id));
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

function deleteCommentaire($id){
    $pdo = connectDB();
    $requete = $pdo->prepare('DELETE FROM commentaires where commentaireId = ?');
    $requete->execute(array($id));
    $requete->closeCursor();
}


?>
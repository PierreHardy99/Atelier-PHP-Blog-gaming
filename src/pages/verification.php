<?php 
    require '../../src/fonctions/dbFonctions.php';
// Vérif l'url envoié par le mail si c'est pas vide
if ( isset($_GET['user']) && isset($_GET['clef'])) {

    $userGet = $_GET['user'];
    $clefGet = $_GET['clef'];
    $verifUser = verif($userGet);

    $userIdDb = $verifUser['userId'];
    $clefDb = $verifUser['clef'];
    $actifDb = $verifUser['actif'];
    $userIdDb = $verifUser['userId'];

    // si actif est à 1 c'est que le compte est validé donc on le dirige vers login et on le prévient
    if ($actifDb == 1) {
        header('location: ../../src/pages/login.php?erreur=Votre compte est déjà validé !');
        exit();
    } else {
        // sinon si la clef envoié en get est la même que celle de la db
        if ($clefGet == $clefDb) {
            // on modifie la valeur à 1
            actifAccount($userIdDb);
            // redirection pour prévenir que c'est good
            header('location: ../../src/pages/login.php?success=Votre compte a été activé !');
            exit();
        } else {
            // sinon on prévient que le lien à un problème
            header('location: ../../src/pages/login.php?erreur=Le lien d\'activation est invalide !');
            exit();
        }
    }
    
} else {
    // sinon le lien est incomplet
    header('location: ../../src/pages/login.php?erreur=Le lien d\'activation est incomplet !');
    exit();
}

?>
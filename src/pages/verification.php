<?php 
require '../../src/fonctions/dbFonctions.php';
if ( isset($_GET['user']) && isset($_GET['clef'])) {
    $userGet = $_GET['user'];
    $clefGet = $_GET['clef'];
    $verifUser = verif($userGet);
    var_dump($verifUser);
    $userIdDb = $verifUser['userId'];
    $clefDb = $verifUser['clef'];
    $actifDb = $verifUser['actif'];
    $userIdDb = $verifUser['userId'];

    if ($actifDb == 1) {
        header('location: ../../src/pages/login.php?erreur=Votre compte est déjà validé !');
        exit();
    } else {
        if ($clefGet == $clefDb) {
            actifAccount($userIdDb);
            header('location: ../../src/pages/login.php?success=Votre compte a été activé !');
            exit();
        } else {
            header('location: ../../src/pages/login.php?erreur=Le lien d\'activation est invalide !');
            exit();
        }
    }
    
} else {
    header('location: ../../src/pages/login.php?erreur=Le lien d\'activation est incomplet !');
    exit();
}

?>
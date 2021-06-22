<!-- Importer nouveau style pour le articles -->
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet"
      media="only screen and (max-width: 1266px)"
      href="../css/mobileArticle1266px.css">
<link rel="stylesheet"
      media="only screen and (max-width: 1100px)"
      href="../css/mobileArticle1100px.css">

<?php
    $titre="Belgium Video Gaming";
    require "../../src/common/template.php";
    require "../../src/fonctions/dbAccess.php";
    require '../../src/fonctions/afficherArticleDbFonctions.php';

    // Je récupère l'id qui est fourni par l'url via mon get
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // J'envoie l'entier de ma valeur dans une variable id
        $id = intval($_GET['id']);
        // J'execute une requete pour récupérer mon contenu
        $contenuArticle = getArticleContent($id);
        var_dump($contenuArticle);
    }
?>

<!-- Composer le header de notre article -->
<section class="headerArticle">
    <!-- 1erer partie avec la cover de mon jeu -->
    <?php 
        if ($contenuArticle[0]['cover']) {
        ?>
            <img src="<?= $contenuArticle[0]['cover']?>" alt="<?= $contenuArticle[0]['nom']?> - cover">
        <?php
        }
    ?>
</section>
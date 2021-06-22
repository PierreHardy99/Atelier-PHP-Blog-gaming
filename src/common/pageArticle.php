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
        } else {
        ?>
            <div></div>
        <?php
        }
    ?>
    <!-- Les informations du jeu cité dans l'article -->
    <div class="infoJeu">
        <h2><?= $contenuArticle[0]['nom'] ?></h2>
        <p>
            genre: <?= $contenuArticle[0]['genre'] ?> | éditeur <?= $contenuArticle[0]['editeur'] ?>
            | développeur: <?= $contenuArticle[0]['developpeur'] ?> | disponible: <?= $contenuArticle[0]['dateDeSortie'] ?>
            | Auteur: <?= $contenuArticle[0]['auteurNom'] ?> <?= $contenuArticle[0]['auteurPrenom'] ?>
        </p>
    </div>
</section>

<section class="monArticle">
    <!-- Intégralité de mon article sur lequel le flex principal est appliqué -->
    <div class="article">
        <!-- Section qui contient l'image et le titre -->
        <div class="background" style="background: url(<?= $contenuArticle[0]['imgUrl'] ?>) center center/cover; min-height: 50vh;">
            <div class="titreArticle">
                <h1><?= $contenuArticle[0]['titre'] ?></h1>
            </div>
        </div>
        <!-- Le contenu de mon article -->
        <div class="contenuArticle">
            <?= $contenuArticle[0]['content'] ?>
        </div>

        <!-- J'injecterai les commentaires de mes users -->
    </div>

    <div class="listArticle">
        <h2>Nos derniers Articles...</h2>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
        <div>
            <img src="../../src/img/article/1624379289returnalNews1.png"  style="width: 100%" alt="">
            <h2 style="color: white"><a href="#">titre de l'article</a></h2>
        </div>
    </div>
</section>
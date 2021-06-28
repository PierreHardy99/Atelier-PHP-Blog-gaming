<?php 
    // Appeler les fichier dont j'ai besoin
    require './src/fonctions/articlesDbFonctions.php';
    $listeArticle = getArticle();
?>
<section id="moreNewsArticle">
    <h2 class="">Plus de news...</h2>

    <div class="moreNews">
        <?php foreach ($listeArticle as $value) {
            $titreRaccourci = substr($value['titre'], 0, 70) . '...';
            $contenuRaccourci = substr($value['content'], 0, 250) . '...';
        ?>
            <div class="MoreNewsArticleCard mb-2 pb-2">
                <div class="pt-2">
                    <img src="<?=$value['imgUrl']?>" alt="<?=$titreRaccourci?>" width="300px" height="150px">
                </div>
                <div class="contenuMoreNews pl-2 pt-1">
                    <a href="../../src/common/pageArticle.php?id=<?=$value['articleId']?>"><h2 class="newsTitre"><?=$titreRaccourci?></h2></a>
                    <p><?=$contenuRaccourci?></p>
                    <p><?=$value['date']?></p>
                </div>
            </div>
        <?php
        }?>
    </div>
    <div class="listArticle ml-1">
        <?php 
            require './src/common/indexIncludes/articleOnTop.php';
        ?>
    </div>
</section>
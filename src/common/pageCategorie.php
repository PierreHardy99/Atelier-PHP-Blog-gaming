<?php
    require '../../src/fonctions/categorieDBFonctions.php';
    require '../../src/fonctions/articlesDbFonctions.php';
    $titre="Belgium Video Gaming";
    require "../../src/common/template.php";
    require "../../src/fonctions/dbAccess.php";

    if (isset($_GET['console']) && !empty($_GET['console'])) {
        $console = $_GET['console'];
    } else {
        header('location: ./index.php');
    }

    $consoleName = getHardName($console);

    $listearticleByHard = getArticleByHard($console);

?>


<section id="moreNewsArticle">
    <h2 class="">Categorie <?=$consoleName[0]['console']?></h2>

    <div class="moreNews">
        <?php 
        if (isset($listearticleByHard)) {
            foreach ($listearticleByHard as $value) {
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
            }
        } else {
            echo '<h3 class="pl-2">Aucun article disponible !</h3>';
        }
        
        ?>
    </div>
</section>
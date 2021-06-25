
<?php 
    require '../../src/fonctions/newsDbFonctions.php';
    $listeDernierArticle = getLastArticle();
?>
<h2>Nos derniers Articles...</h2>
<?php 
    foreach ($listeDernierArticle as $value) {
    ?>
        <div>
            <img src="<?=$value['imgUrl']?>" alt="<?=$value['titre']?> - COVER">
            <h2 style="color: white; font-size: 16px;"><a href="../../src/common/pageArticle.php?id=<?=$value['articleId']?>"><?=$value['titre']?></a></h2>
        </div>
    <?php
    }

?>


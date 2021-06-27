<?php 
    $listeArticleTop = getTop();
?>
<h2>Les articles mis en avant</h2>
<?php 
    foreach ($listeArticleTop as $value) {
    ?>
        <div>
            <img src="<?=$value['imgUrl']?>" alt="<?=$value['titre']?> - COVER" width="75px" height="75px">
            <h2 style="color: white; font-size: 16px;"><a href="../../src/common/pageArticle.php?id=<?=$value['articleId']?>"><?=$value['titre']?></a></h2>
        </div>
    <?php
    }
?>
<?php 
    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role']) {
        if (isset($_GET['deleteArticle']) && $_GET['deleteArticle']== true) {
            $delArticleId = $_GET['value'];

            if (isset($_GET['img'])) {
                unlink($_GET['img']);
            }

            delArticle($delArticleId);
            header('location: ../../src/pages/admin.php?choix=listeArticle');
            exit();
        }
    }

    $listeArtice = getArticleAdmin();

?>

<div class="gestionCategorie">
    <table class="mlr-a mt-3 p-1">
        <thead>
            <tr>
                <th colspan="2">Liste des articles</th>
                <th colspan="2"><a href="../../src/pages/articles.php?choix=redigerArticle">Ajouter un article</a></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Titre</td>
                <td>Cover</td>
                <td>Contenu</td>
                <td>Date</td>
                <td>Catégorie</td>
                <td>Genre</td>
                <td>Auteur</td>
                <td>Jeu</td>
                <td>Console</td>
                <td>A la une ?</td>
                <td>Supprimer</td>
            </tr>
            <?php 

                foreach ($listeArtice as $value) {
            ?>
                <tr>
                    <td><?=$value['titre']?></td>
                    <td><img src="<?=$value['imgUrl']?>" alt="Img article" width="100px" height="100px"></td>
                    <td><a href="../../src/common/pageArticle.php?id=<?=$value['articleId']?>" target="_blank">Contenu</a></td>
                    <td><?=$value['date']?></td>
                    <td><?=$value['nomCategorie']?></td>
                    <td><?=$value['genre']?></td>
                    <td><?=$value['nom'].' '.$value['prenom']?></td>
                    <td><?=$value['jeu']?></td>
                    <td><?=$value['console']?></td>
                    <?php 
                        if ($value['star'] == 1) {
                        ?>
                            <td><i class="fas fa-check" style="color:red;"></i></td>
                        <?php
                        } else {
                        ?>
                            <td><i class="fas fa-times"  style="color:red;"></i></td>
                        <?php
                        }
                    ?>
                    <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeArticle&deleteArticle=true&value=<?=$value['articleId']?>&img=<?=$value['imgUrl']?>"><i class="far fa-plus-square"></i></a></td>
                </tr>
            <?php
                } 
        ?>

        </tbody>
    </table>
</div>
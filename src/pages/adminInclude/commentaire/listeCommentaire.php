<?php 

    $listeCommentaire = getCommentaire();

?>
<div class="gestionCategorie">
    <table class="mlr-a mt-3 p-1">
        <thead>
            <tr>
                <th colspan="2">Liste des users</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Article N°</td>
                <td>Auteur</td>
                <td>Date</td>
                <td>Commentaire</td>
                <td>Supprimer</td>
            </tr>
            <?php 

                foreach ($listeCommentaire as $value) {

            ?>
                <tr>
                    <td><a href="../../src/common/pageArticle.php?id=<?=$value['articleId']?>" target="_blank"><?=$value['articleId']?></a></td>
                    <?php 
                        if ($value['auteurId'] != null) {
                    ?>
                            <td><?=$value['pseudo']?></a></td>
                    <?php
                        } else {
                    ?>
                            <td><?=$value['pseudo']?></td>
                    <?php
                        }
                    ?>
                    
                    <td><?=$value['dateCommentaire']?></td>
                    <td><?=$value['contenu']?></td>
                    <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeCommentaire&deleteCommentaire=true&value=<?=$value['commentaireId']?>"><i class="far fa-plus-square"></i></a></td>
                </tr>
            <?php
                } 
        ?>

        </tbody>
    </table>
</div>
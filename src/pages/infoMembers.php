<?php
    $titre = "Info membres";
    require '../../src/common/template.php';
    require '../../src/fonctions/dbAccess.php';
    require '../../src/fonctions/userDBFonctions.php';
    require '../../src/fonctions/articlesDbFonctions.php';
    require '../../src/fonctions/commentairesDBFonctions.php';

    if (isset($_GET['userId']) && !empty($_GET['userId'])) {
        if ($_GET['userId'] == $_SESSION['user']['id']) {
            header('location: ../../src/pages/account.php');
            exit();
        } 
        // Par secu tranformer la variable en INT
        $id = intval($_GET['userId']);
        $listeUser = getUserbyId($id);
        if (empty($listeUser)) {
            header('location: ../../src/pages/membres.php');
            exit(); 
        }
        $listeArticle = getArticleForAccount($id);
        $listeCommentaire = getCommentaireForAccount($id);
    }else {
        header('location: ../../src/pages/membres.php');
        exit();
    }
    
?>

<section id="account">
    <div class="account">

        <div class="infosMembre p-2">
            <table>
                <tr>
                    <td>
                        <img src="<?= $listeUser[0]['avatar'] ?>" alt="<?=$listeUser[0]['login']?> - Avatar">
                    </td>
                </tr>
                <tr>
                    <td>pseudo:</td>
                    <?php 
                        switch ($listeUser[0]['nomRole']) {
                            case 'admin':
                                ?>
                                    <td><span class="userStyle colorAdmin"><?=$listeUser[0]['login']?></span></td>
                                <?php
                                break;
                            case 'moderateur':
                                ?>
                                    <td><span class="userStyle colorModo"><?=$listeUser[0]['login']?></span></td>
                                <?php
                                break;
                            case 'auteur':
                                ?>
                                    <td><span class="userStyle colorAuteur"><?=$listeUser[0]['login']?></span></td>
                                <?php
                                break;
                            case 'membre':
                                ?>
                                    <td><span class="userStyle colorMembre"><?=$listeUser[0]['login']?></span></td>
                                <?php
                                break;
                        }
                    ?>
                </tr>
                <tr>
                    <td>Nom:</td>
                    <td><?= $listeUser[0]['nom'] ?></td>
                </tr>
                <tr>
                    <td>Prenom:</td>
                    <td><?= $listeUser[0]['prenom'] ?></td>
                </tr>
                <tr>
                    <td>Statut:</td>
                    <?php 
                        switch ($listeUser[0]['nomRole']) {
                            case 'admin':
                                ?>
                                    <td><span class="userStyle colorAdmin"><?=$listeUser[0]['nomRole']?></span></td>
                                <?php
                                break;
                            case 'moderateur':
                                ?>
                                    <td><span class="userStyle colorModo"><?=$listeUser[0]['nomRole']?></span></td>
                                <?php
                                break;
                            case 'auteur':
                                ?>
                                    <td><span class="userStyle colorAuteur"><?=$listeUser[0]['nomRole']?></span></td>
                                <?php
                                break;
                            case 'membre':
                                ?>
                                    <td><span class="userStyle colorMembre"><?=$listeUser[0]['nomRole']?></span></td>
                                <?php
                                break;
                        }
                    ?>
                </tr>
            </table>
        </div>
        <div class="contenuMembre p-2">
            <!-- Si le role est au moins auteur -->
            <?php
                if($listeUser[0]['nomRole'] == "auteur" || $listeUser[0]['nomRole'] == "admin"): ?>
            <h2>Les Articles de <?=$listeUser[0]['login']?></h2>
            <?php 
                if (isset($listeArticle)) {
                    foreach ($listeArticle as $value) {
                        $titreRaccourcis = substr($value['titre'],0,75).'...';
                    ?>
                        <p><?=$titreRaccourcis?> <a href="../../src/common/pageArticle.php?id=<?=$value['articleId']?>"><i class="fas fa-plus"></i></a></p>
                    <?php
                    }
                } else {
                    echo '<p>pas d\'articles</p>';
                }
            ?>
            <!-- LISTE DES ARTICLES -->
            <?php endif; ?>
            <h2>Les Commentaires de <?=$listeUser[0]['login']?></h2>
            <?php 
                if (isset($listeCommentaire)) {
                    foreach ($listeCommentaire as $value) {
                        $contenuRaccourcis = substr($value['contenu'],0,75).'...';
                    ?>
                        <p><?=$contenuRaccourcis?> <a href="../../src/common/pageArticle.php?id=<?=$value['articleId']?>"><i class="fas fa-plus"></i></a></p>
                    <?php
                    }
                } else {
                    echo '<p>pas de commentaires</p>';
                }
            ?>
            <!-- LISTE DES COMMENTAIRES -->
        </div>
    </div>
</section>
<?php
    require "../../src/common/footer.php";
?>
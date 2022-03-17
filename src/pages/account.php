<?php
    $titre = "Votre compte";
    require "../../src/common/template.php";
    require "../../src/fonctions/dbFonctions.php";
    require '../../src/fonctions/mesFonctions.php';
    require '../../src/fonctions/articlesDbFonctions.php';
    require '../../src/fonctions/commentairesDBFonctions.php';
    
    // traiter le formulaire d'envoi de photo
    if(isset($_FILES["fichier"])):
        // j'appelle ma fonction envoyer image dans une variable
        $photo = sendImg($_FILES["fichier"], "avatar");
        // Je lance ma fonction pour mettre à jour la base de donnée
        updateImg($photo);
        // image envoyée et mise à jour de la bd ok, je peux effacer l'ancien avatar
        unlink($_SESSION["user"]["photo"]);
        // Je mets à jour ma variable session photo
        $_SESSION["user"]["photo"] = $photo;
        // je recharge la page
        header("location ../../src/pages/account.php?maj=true&message=Félicitation, votre avatar est mis à jour!");
        header("location ../../src/pages/account.php?maj=true&message=Félicitation, votre avatar est mis à jour!");
    endif;

    $listeArticle = getArticleForAccount($_SESSION['user']['id']);
    $listeCommentaire = getCommentaireForAccount($_SESSION['user']['id']);
?>

<section id="account">
    <div class="account">

        <div class="infosMembre p-2">
            <a href="../../src/pages/account.php?edit=true"><img title="Cliquez pour changer votre avatar" src="<?= $_SESSION["user"]["photo"] ?>" alt=""></a>
            <!-- Si mon user a cliqué sur la photo, faire apparaître le formulaire d'envoi de fichier -->
            <?php 
                if(isset($_GET["edit"]) && $_GET["edit"] == true):
            ?>
            <form method="post" action="../../src/pages/account.php" enctype="multipart/form-data">
                    <input type="file" name="fichier" required>
                    <input type="submit" value="Envoyez votre photo">
            </form>
            <?php endif; 
                // Si la mise à jour s'est bien passée, afficher l'information
                if(isset($_GET["maj"]) && isset($_GET["maj"]) == true):
                    echo "<h3>" . $_GET["message"] . "</h3>";
                endif;
            ?>
            <table>
                <tr>
                    <td>pseudo:</td>
                    <?php 
                        switch ($_SESSION['user']['role']) {
                            case 'admin':
                                ?>
                                    <td><span class="userStyle colorAdmin"><?=$_SESSION["user"]["login"]?></span></td>
                                <?php
                                break;
                            case 'moderateur':
                                ?>
                                    <td><span class="userStyle colorModo"><?=$_SESSION["user"]["login"]?></span></td>
                                <?php
                                break;
                            case 'auteur':
                                ?>
                                    <td><span class="userStyle colorAuteur"><?=$_SESSION["user"]["login"]?></span></td>
                                <?php
                                break;
                            case 'membre':
                                ?>
                                    <td><span class="userStyle colorMembre"><?=$_SESSION["user"]["login"]?></span></td>
                                <?php
                                break;
                        }
                    ?>
                </tr>
                <tr>
                    <td>Nom:</td>
                    <td><?= $_SESSION["user"]["nom"] ?></td>
                </tr>
                <tr>
                    <td>Prenom:</td>
                    <td><?= $_SESSION["user"]["prenom"] ?></td>
                </tr>
                <tr>
                    <td>Statut:</td>
                    <?php 
                        switch ($_SESSION['user']['role']) {
                            case 'admin':
                                ?>
                                    <td><span class="userStyle colorAdmin"><?=$_SESSION["user"]["role"]?></span></td>
                                <?php
                                break;
                            case 'moderateur':
                                ?>
                                    <td><span class="userStyle colorModo"><?=$_SESSION["user"]["role"]?></span></td>
                                <?php
                                break;
                            case 'auteur':
                                ?>
                                    <td><span class="userStyle colorAuteur"><?=$_SESSION["user"]["role"]?></span></td>
                                <?php
                                break;
                            case 'membre':
                                ?>
                                    <td><span class="userStyle colorMembre"><?=$_SESSION["user"]["role"]?></span></td>
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
                if($_SESSION["user"]["role"] == "auteur" || $_SESSION["user"]["role"] == "admin"): ?>
            <h2>Vos Articles</h2>
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
            <h2>Vos Commentaires</h2>
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
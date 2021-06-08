<?php
    $titre = "Votre compte";
    require "../../src/common/template.php";
    require '../../src/fonctions/dbFonctions.php';
    require '../../src/fonctions/mesFonctions.php';
?>

<section id="account">
    <div class="account">
        <div class="infosMembre p-2">
            <a href="../../src/pages/account.php?edit=true"><img title="Cliquez pour changer votre avatar" src="<?=$_SESSION['user']['photo']?>" alt="Avatar du membre"></a>
            <!-- Si mon user à cliqué sur la photo je fais apparaitre un formulaire -->
            <?php 
                if (isset($_GET['edit']) && $_GET['edit'] == true) {
            ?>
            <form action="../../src/pages/account.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fichier">
                <input type="submit" value="Envoyer votre avatar">
            </form>
            <?php
                }
                // Message pour féliciter l'upload du formulaire
            ?>
            <table>
                <tr>
                    <td>Pseudo:</td>
                    <td><?=$_SESSION['user']['login']?></td>
                </tr>
                <tr>
                    <td>Nom:</td>
                    <td><?=$_SESSION['user']['nom']?></td>
                </tr>
                <tr>
                    <td>Prénom:</td>
                    <td><?=$_SESSION['user']['prenom']?></td>
                </tr>
                <tr>
                    <td>Statut:</td>
                    <td><?=$_SESSION['user']['role']?></td>
                </tr>
            </table>
        </div>
        <div class="contenuMembre p-2">
        <?php 
        // Si le user est au moins auteur, j'affiche une liste de ses articles
            if ($_SESSION['user']['role'] == 'auteur' || $_SESSION['user']['role'] == 'admin') {
        ?>
            <h2>Vos articles</h2>
            <p>Pas d'articles</p>
        <?php
            }
        ?>
            <h2>Vos commentaires</h2>
            <p>pas de commentaires</p>
        </div>
    </div>
</section>

<?php 
    // Traitement du formulaire
    if (isset($_FILES['fichier'])) {
        // Appelle ma fonction sendImg
        $photo = sendImg($_FILES['fichier'],"avatar");
    }
require '../../src/common/footer.php';
?>
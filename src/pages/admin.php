<?php 
$titre = "Espace d'administration";
require "../../src/common/template.php";
require '../../src/fonctions/dbFonctions.php';
require '../../src/fonctions/mesFonctions.php';
require '../../src/fonctions/categorieDBFonctions.php';
require '../../src/fonctions/gameDBFonctions.php';
require '../../src/fonctions/userDBFonctions.php';
require '../../src/fonctions/commentairesDBFonctions.php';
require '../../src/fonctions/articlesDbFonctions.php';

// Refuser l'accès à la page aux personnes qui ne sont pas admin
if (isset($_SESSION['user']['role']) != 'admin') {
    header('location: ../../index.html');
    exit();
}

// Gérer une class de manière dynamique
$choixMenu = 'adminContenu';
?>

<section class="gestionAdmin mb-5 p-3">
    <div class="template p-2">
        <div class="menu mt-5">
            <a href="../../src/pages/admin.php?choix=listeCategorie">Gérer les catégories</a>
            <a href="../../src/pages/admin.php?choix=listeJeu">Gérer les jeux</a>
            <a href="../../src/pages/admin.php?choix=listeUser">Gérer les users</a>
            <a href="../../src/pages/admin.php?choix=listeCommentaire">Gérer les commentaires</a>
            <a href="../../src/pages/admin.php?choix=listeArticle">Gérer les articles</a>
        </div>

        <div class="<?=$choixMenu?>">
            <?php 
                // Quand l'admin selectionne les catégories
                if (isset($_GET['choix']) && $_GET['choix'] == 'listeCategorie') {
                    require '../../src/pages/adminInclude/categorie/listeCategorie.php';
                }
                if (isset($_GET['choix']) && $_GET['choix'] == 'listeJeu') {
                    require '../../src/pages/adminInclude/listeJeu/listeJeu.php';
                }
                if (isset($_GET['choix']) && $_GET['choix'] == 'listeUser') {
                    require '../../src/pages/adminInclude/user/listeUser.php';
                }
                if (isset($_GET['choix']) && $_GET['choix'] == 'listeCommentaire') {
                    require '../../src/pages/adminInclude/commentaire/listeCommentaire.php';
                }
                if (isset($_GET['choix']) && $_GET['choix'] == 'listeArticle') {
                    require '../../src/pages/adminInclude/article/listeArticle.php';
                }
            ?>
        </div>
    </div>
</section>



<?php 
    require '../../src/common/footer.php';
?>
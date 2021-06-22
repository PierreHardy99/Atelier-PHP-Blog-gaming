<?php 
    require '../../src/pages/redacArticlesInclude/traitementTamponLiens.php';
    require '../../src/fonctions/articlesDbFonctions.php';
    // Encapsuler la liste des jeux dans une variable
    $listeJeu = getGame();
    // Encapsuler  liste du hardware
    $listeHard = getHardware();
    // Liste des catégories d'articles
    $listeGenre = getGameCategory();
    // type d'article
    $listeTypeArticle = getCategorie();

    // Traitement du formulaire
    if (isset($_POST['titre']) && isset($_FILES['fichier']) && isset($_POST['jeu']) && isset($_POST['console']) && isset($_POST['genre']) && isset($_POST['typeArticle']) && isset($_POST['contenu'])) {

        $star = 0; // par défaut je n'envoie pas à la une
        $titre = $_POST['titre'];
        $imgUrl = $_FILES['fichier']; // Traitement à effectuer dans al requete envoyer article
        $content = $_POST['contenu']; // Tel quel
        $date = date('Y-m-d H:i:s'); // Récupérer la date du jour
        $categorieId = $_POST['typeArticle'];
        $gameCategorieId = $_POST['genre'];
        $auteurId = $_SESSION['user']['id'];
        $gameId = $_POST['jeu'];
        $hardId = $_POST['console'];

        // Vérifier si star a été coché
        if (isset($_POST['star']) && $_POST['star'] == true) {
            $star = 1;
        }

        envoyerArticle($titre,$imgUrl,$content,$date,$categorieId,$gameCategorieId,$auteurId,$gameId,$hardId,$star);

    }
?>

<!-- Formulaire de création d'article -->
<section class="articles">
    <form action="" method="post" enctype="multipart/form-data">
        <p>Titre de votre article:</p>
        <input type="text" name="titre" required>
        <p>Image de référence:</p>
        <input type="file" name="fichier" required>
        <table>
            <tr>
                <td>Jeu concerné</td>
                <td>Console</td>
                <td>Genre</td>
                <td>Type d'article</td>
                <td>A la une ?</td>
            </tr>
            <tr>
                <td>
                    <select name="jeu">
                    <?php 
                        for ($i=0; $i < count($listeJeu) ; $i++) { 
                        ?>
                            <option value="<?=$listeJeu[$i][1]?>"><?=$listeJeu[$i][1]?></option>
                        <?php
                        }
                    ?>
                    </select>
                </td>
                <td>
                    <select name="console">
                    <?php 
                        for ($i=0; $i < count($listeHard) ; $i++) { 
                        ?>
                            <option value="<?=$listeHard[$i][1]?>"><?=$listeHard[$i][1]?></option>
                        <?php
                        }
                    ?>
                    </select>
                </td>
                <td>
                    <select name="genre">
                    <?php 
                        for ($i=0; $i < count($listeGenre) ; $i++) { 
                        ?>
                            <option value="<?=$listeGenre[$i][1]?>"><?=$listeGenre[$i][1]?></option>
                        <?php
                        }
                    ?>
                    </select>
                </td>
                <td>
                    <select name="typeArticle">
                    <?php 
                        for ($i=0; $i < count($listeTypeArticle) ; $i++) { 
                        ?>
                            <option value="<?=$listeTypeArticle[$i][1]?>"><?=$listeTypeArticle[$i][1]?></option>
                        <?php
                        }
                    ?>
                    </select>
                </td>
                <td><input type="checkbox" name="star"></td>

            </tr>
        </table>
        <p>Composer votre article</p>
        <textarea name="contenu" id="contenu"></textarea>
        <input class="btnTampon" type="submit" value="Envoyez votre article">
    </form>
</section>
<!-- Ajout du script tinymce et activer options -->
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist image imagetools media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
</script>
<?php 
    // Vérifier si admin
    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == "admin") {
        // Mon formulaire ajout gameCat a-t-il été envoyé
        if (isset($_POST['gameCat']) && !empty($_POST['gameCat'])) {
            $gameCat = htmlspecialchars($_POST['gameCat']);
            addGameCategorie($gameCat);
        }

        if (isset($_GET['deleteGameCat']) && $_GET['deleteGameCat'] == true) {
            $deleteGameCat = htmlspecialchars($_GET['value']);
            $intdeleteGameCat = intval($deleteGameCat);
            deleteGameCategorie($intdeleteGameCat);
        }
    }

    $listeGameCat = getGameCategorie();

?>
<table class="mlr-a mt-3 p-1" id="gameCat">
    <thead>
        <tr>
            <th colspan="2">Liste des jeux</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nom de la catégorie</td>
            <td>Supprimer</td>
        </tr>

        <!-- FOREACH POUR AFFICHER LES TYPES D'ARTICLE DISPONIBLE -->
        <?php 
        
            foreach ($listeGameCat as $value) {
            ?>
                <tr>
                    <td><?=$value['genre']?></td>
                    <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeCategorie&deleteGameCat=true&value=<?=$value['gameCategoryId']?>"><i class="far fa-plus-square"></i></a></td>
                </tr>  
            <?php
            }
        ?>
        <tr>
            <td>Ajouter un genre</td>
            <td class="ta-c tc-g"><a href="../../src/pages/admin.php?choix=listeCategorie&createGameCat=true/#gameCat"><i class="far fa-plus-square"></i></a></td>
        </tr>
        <?php 
            // Ajouter une Game Categorie
            if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
                if (isset($_GET['createGameCat']) && $_GET['createGameCat'] == true) {
                ?>
                    <form action="" method="post">
                        <tr>
                            <td>Catégorie de jeux à ajouter</td>
                            <td class="ta-c tc-g"><input type="text" name="gameCat" placeholder="Entrez la catégorie de jeux" required></td>
                            <td><input type="submit" value="Ajouter game Catégorie"></td>
                        </tr>
                    </form>
                <?php
                }
            }
        ?>
    </tbody>
</table>
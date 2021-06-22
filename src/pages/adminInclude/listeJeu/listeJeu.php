<?php 
    // Vérifier si admin
    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == "admin") {
        if (isset($_POST['nom']) && !empty($_POST['developpeur']) && !empty($_POST['editeur']) && !empty($_POST['date']) && !empty($_POST['cover']) && !empty($_POST['typeConsole']) && !empty($_POST['typeGenre'])) {
            $option = array(
                "nom" => FILTER_SANITIZE_STRING,
                "developpeur" => FILTER_SANITIZE_STRING,
                "editeur" => FILTER_SANITIZE_STRING,
                "date" => FILTER_SANITIZE_STRING,
                "cover" => FILTER_SANITIZE_URL,
                "typeConsole" => FILTER_VALIDATE_INT,
                "typeGenre" => FILTER_VALIDATE_INT
            );
            $result = filter_input_array(INPUT_POST,$option);

            $nomJeu = $result['nom'];
            $devJeu = $result['developpeur'];
            $editJeu = $result['editeur'];
            $dateJeu = $result['date']; // Ou $_POST['date']
            $coverJeu = $result['cover'];
            $typeConsjeu = $result['typeConsole'];
            $typeGenreJeu = $result['typeGenre'];
            AddGame($nomJeu,$typeConsjeu,$typeGenreJeu,$devJeu,$editJeu,$dateJeu,$coverJeu);
            header("location: ../../src/pages/admin.php?choix=listeJeu");
            exit();
        }

        if (isset($_GET['deleteGame']) && $_GET['deleteGame'] == true) {
            $deleteGame = htmlspecialchars($_GET['value']);
            $intDeleteGame = intval($deleteGame);
            // Supprime la cover du ficher
            // if (isset($_GET['cover'])) {
            //     unlink($_GET['cover']);
            // }
            deleteGame($intDeleteGame);
            header("location: ../../src/pages/admin.php?choix=listeJeu");
            exit();
        }
    }

    // Je récupère les type d'article dispo dans ma db
    $listeJeu = getGame();
    $listeGameCat = getGameCategory();
    $listeHard = getHardware();

?>
<h2 class="ta-c mt-5">Liste des jeux existants</h2>
<h3><a href="../../src/pages/admin.php?choix=listeJeu&createGame=true/#addGame"><i class="far fa-plus-square">Ajouter Jeux</i></a></h3>
<?php 
if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
    if (isset($_GET['createGame']) && $_GET['createGame'] == true) {
    ?>
        <section class="register">
            <form action="" method="post" class="login " id="addGame">
                <table>
                        <tr>
                            <td><input type="text" name="nom" placeholder="Nom du jeux" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="developpeur" placeholder="Développeur" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="editeur" placeholder="Editeur" required></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="date" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cover" placeholder="adresse cover" required></td>
                        </tr>
                        <tr>
                            <td><select name="typeConsole" required>
                            <option value="">-- Selectionner un type de console</option>
                                <?php 
                                    foreach ($listeHard as $value) {
                                    ?>
                                      <option value="<?= $value['hardId']?>"><?=$value['console']?></option>  
                                    <?php
                                    }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td><select name="typeGenre" required>
                                <option value="">-- Selectionner un genre de jeux</option>
                                <?php 
                                    foreach ($listeGameCat as $value) {
                                    ?>
                                      <option value="<?= $value['gameCategoryId']?>"><?=$value['genre']?></option>  
                                    <?php
                                    }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Enregistrer le jeu"></td>
                        </tr>
                </table>
            </form>
        </section>
    <?php
    }
}

?>
<div class="gestionCategorie">
    <table class="mlr-a mt-3 p-1">
        <thead>
            <tr>
                <th colspan="2">Liste des jeux</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nom du jeux</td>
                <td>Développeur</td>
                <td>Editeur</td>
                <td>Date de sortie</td>
                <td>Cover</td>
                <td>Console</td>
                <td>Genre</td>
                <td>Supprimer</td>
            </tr>
            <?php 

                foreach ($listeJeu as $value) {
            ?>
                <tr>
                    <td><?=$value['nom']?></td>
                    <td><?=$value['developpeur']?></td>
                    <td><?=$value['editeur']?></td>
                    <td><?=$value['dateDeSortie']?></td>
                    <td><img src="<?=$value['cover']?>" alt="<?=$value['nom']?>-COVER" width="100px" height="100px"></td>
                    <td><?=$value['console']?></td>
                    <td><?=$value['genre']?></td>
                    <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeJeu&deleteGame=true&value=<?=$value['gameId']?>&cover=<?=$value['cover']?>"><i class="far fa-plus-square"></i></a></td>
                </tr>
            <?php
                } 
        ?>

        </tbody>
    </table>
</div>


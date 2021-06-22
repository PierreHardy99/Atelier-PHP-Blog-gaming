<style>
    .miniature{
        width: 50px;
        height: auto;
    }

    table tr td{
        padding: 0.5rem;
    }
</style>


<?php
    $tamponUser = intval($_SESSION['user']['id']);
    // Vérifier si user vide son tampon
    if (isset($_GET['tampon']) && $_GET['tampon'] == true) {
        $pdo = connectDB();
        $requete = $pdo->prepare('DELETE FROM tampon WHERE auteurId = ?');
        $requete->execute(array($tamponUser)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
        echo '<h2>Mémoire tampon effacée, merci pour votre courtoisie</h2>';
    }
    // Vérifier si le user veut récupéré les liens des photos qu'il a uploadée
    
    if (isset($_GET['liens']) && $_GET['liens'] == 'memoireTampon') {
        $pdo = connectDB();
        $requete = $pdo->query('SELECT * FROM tampon WHERE auteurId = '.$tamponUser) or die(print_r($requete->errorInfo(), TRUE));
?>
        <table border="1">
            <tr>
                <td>Lien de l'image</td>
                <td>Miniature</td>
            </tr>
            <?php
            while ($données = $requete->fetch()) {
            ?>
                <tr>
                    <td><?=$données['liens']?></td>
                    <td><img src="<?=$données['liens']?>" alt="<?=$données['liens']?>" class="miniature"></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <h3>Une fois l'article publié, ne pas oublier de vider le tampon</h3>
        <h3 class="btnTampon"><a href="../../src/pages/articles.php?choix=redigerArticle&liens=memoireTampon&tampon=true">Vider tampon</a></h3>
    <?php
    }
    ?>
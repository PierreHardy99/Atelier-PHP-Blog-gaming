<?php 
    if (isset($_GET['id'])) {
        $articleId = $_GET['id'];
    }

    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
        if (isset($_SESSION["user"]) && $_SESSION["connecté"] == true) {
            $userId = $_SESSION['user']['id'];
            $pseudo = $_SESSION['user']['login'];
        } else if (isset($_POST['pseudo'])) {
            $userId = null;
            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        }
        
        $date = date('Y-m-d H:i:s');
        $commentaire = $_POST['commentaire'];
        envoyerCommentaires($articleId,$userId,$pseudo,$date,$commentaire);
    }
    $listeCommentaire = getCommentaire($articleId);
?>
    <section>
        <table>
            <form action="../../../src/common/pageArticle.php?id=<?=$articleId?>#commentaire" method="post">
                <thead>
                    <tr>
                        <td>Commentez cet article</td>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        if (isset($_SESSION["user"]) && $_SESSION["connecté"] == true) {
                    ?>
                        <tr>
                            <td><img src="<?=$_SESSION['user']['photo']?>" alt="<?=$_SESSION['user']['login']?> - AVATAR" width="150px" height="150px"></td>

                        </tr>
                        <tr>
                            <td><?=$_SESSION['user']['login']?></td>
                        </tr>
                    <?php
                        } else {
                    ?>
                            <tr>
                                <td><img src="../../../src/img/site/defaut_avatar.png" alt="defaut_avatar - AVATAR" width="150px" height="150px"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="pseudo" required></td>
                            </tr>
                    <?php    
                        }
                    ?>
                    <tr>
                        <td><textarea name="commentaire" cols="30" rows="15" placeholder="Entrez votre commentaire..." required></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Envoyer votre commentaire"></td>
                    </tr>
                </tbody>
            </form>
        </table>
    </section>

    <section>
    <?php
        if (isset($listeCommentaire)) {
            foreach ($listeCommentaire as $value) {
                if ($value['auteurId'] != null) {
                    $avatar = getAvatar($value['auteurId']);
                } else {
                    $avatar = '../../src/img/site/defaut_avatar.png';
                }
                ?>
                    <div id="commentaire">
                        <div>
                            <img src="<?=$avatar?>" alt="<?=$value['pseudo']?> - AVATAR" width="150px" height="150px">
                            <p><?=$value['pseudo']?></p>
                            <p><?=$value['dateCommentaire']?></p>
                        </div>
                        <div>
                            <p><?=$value['contenu']?></p>
                        </div>
                    </div>

                <?php
            }
        }
    ?>
    </section>

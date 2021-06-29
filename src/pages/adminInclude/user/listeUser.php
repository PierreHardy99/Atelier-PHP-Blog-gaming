<?php 

    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
        if (isset($_GET['deleteUser']) && isset($_GET['deleteUser']) == true) {
            $delUserId = htmlspecialchars($_GET['value']);

            if (isset($_GET['avatar']) && $_GET['avatar'] != '../../src/img/site/defaut_avatar.png') {
                unlink($_GET['avatar']);
            }

            deleteUser($delUserId);
            header('location: ../../src/pages/admin.php?choix=listeUser');
            exit();
        }

        if (isset($_GET['banUser']) && isset($_GET['banUser']) == true) {
            $banUserId = htmlspecialchars($_GET['value']);

            banUser($banUserId);
            header('location: ../../src/pages/admin.php?choix=listeUser');
            exit();
        }

    }
    $listeUser = getUser();

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
                <td>Avatar</td>
                <td>Login</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Role</td>
                <td>Supprimer</td>
                <td>Bannir</td>
            </tr>
            <?php 

                foreach ($listeUser as $value) {
            ?>
                <tr>
                    <td><img src="<?=$value['avatar']?>" alt="<?=$value['login']?> - AVATAR" width="100px" height="100px"></td>
                    <td><?=$value['login']?></td>
                    <td><?=$value['nom']?></td>
                    <td><?=$value['prenom']?></td>
                    <td><?=$value['email']?></td>
                    <td><?=$value['nomRole']?></td>
                    <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeUser&deleteUser=true&value=<?=$value['userId']?>&avatar=<?=$value['avatar']?>"><i class="far fa-plus-square"></i></a></td>
                    <?php 
                        if ($value['ban'] == null) {
                        ?>
                            <td class="ta-c tc-r"><abbr title="L'utilisateur est déjà banni" style="color:red;"><i class="fas fa-ban"></i></abbr></td>
                        <?php
                        } else {
                        ?>
                            <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeUser&banUser=true&value=<?=$value['userId']?>"><i class="fas fa-user-slash"></i></a></td>
                        <?php
                        }
                    ?>
                    
                </tr>
            <?php
                } 
        ?>

        </tbody>
    </table>
</div>
<?php 

    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
        if (isset($_GET['deleteUser']) && isset($_GET['deleteUser']) == true) {
            $delGameId = htmlspecialchars($_GET['value']);

            if (isset($_GET['avatar'])) {
                unlink($_GET['avatar']);
            }

            deleteUser($delGameId);
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
                </tr>
            <?php
                } 
        ?>

        </tbody>
    </table>
</div>
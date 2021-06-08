<?php
    $titre = "Connectez-vous";
    require "../../src/common/template.php";
    

?>

<section>
    <form action="" method="post" class="login">
        <table>
            <thead>

                <tr>
                    <th colspan="2">Connectez-vous</th>
                </tr>
        
            </thead>
            <tbody>

                <tr>
                    <td>Login:</td>
                    <td><input type="text" name="login" require placeholder="Entrez votre login"></td>
                </tr>

                    <td>Mot de passe:</td>
                    <td><input type="password" name="mdp" require placeholder="Entrez votre mot de passe"></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Se connecter"></td>
                </tr>
        
            </tbody>
        </table>
    </form>
</section>
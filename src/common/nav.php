<?php
    // Traiter la déconnection du user
    if (isset($_GET["deconnect"]) && $_GET["deconnect"] == true) {
        $_SESSION['connecté'] = false;
        session_destroy();
        header('location: ./index.php');
        exit();
    }
    
?>
<header class="bg">
    <div>
        <a href="../../index.php"><img src="../../src/img/site/logotest.gif" alt="Logo Site Belgium Video-Gaming"></a>
    </div>
    <nav>
        <ul>
            <?php

                $dsn = "mysql:host=localhost;dbname=blog-gaming;charset=utf8";

                $pdo = new PDO($dsn,"root","");

                $requete = $pdo->query('SELECT * FROM hardware') or die(print_r($requete->errorInfo(), TRUE));
            
                $donnees = $requete->fetchAll();

                $requete->closeCursor();

                foreach ($donnees as $value) {
                ?>
                    <li><a href="../../src/common/pageCategorie.php?console=<?=$value['hardId']?>"><?=$value['console']?></a></li>
                <?php
                }
                
            ?>
                
        </ul>
    </nav>
    <div>
        <nav>
        <?php 
            if (!isset($_SESSION["connecté"]) || $_SESSION["connecté"] == false) {
        ?>
                <ul>
                    <li><a href="../../src/pages/login.php"><i class="fas fa-sign-in-alt"></i>Login</a></li>
                    <li><a href="../../src/pages/register.php"><i class="fas fa-user-plus"></i>S'enregistrer</a></li>
                </ul>
        <?php        
            }
            if (isset($_SESSION["connecté"]) && $_SESSION["connecté"] == true) {
        ?>
                <ul>
                    <li><a href="../../src/pages/account.php?userId=<?=$_SESSION['user']['id']?>"><i class="fas fa-user"></i> Mon Compte</a></li>
                    <li><a href="../../index.php?deconnect=true"><i class="fas fa-user-alt-slash"></i> Déconnecter</a></li>

                    <?php        
                    }
                    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'auteur' || isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
                        ?>
                        <li><a href="../../src/pages/articles.php"><i class="fas fa-edit"></i> Rédiger</a></li>
                        <?php
                    }
                    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
                        ?>
                        <li><a href="../../src/pages/admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
                        <?php
                    }
                    ?>


                </ul>
        </nav>
    </div>
</header>
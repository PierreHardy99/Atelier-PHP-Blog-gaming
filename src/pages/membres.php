<?php 

    $titre = "Membres du site";
    require '../../src/common/template.php';
    require '../../src/fonctions/dbAccess.php';
    require '../../src/fonctions/userDBFonctions.php';
    

    $listeUser = getUser();
?>
<link rel="stylesheet" href="../../src/css/generique.css">
<section id="member">
    <?php 
        foreach ($listeUser as $value) {
        ?>
            <div class="card p-4 ml-2 mr-2 mt-2">
                <div class="imgMember mb-2">
                    <img src="<?=$value['avatar']?>" alt="<?=$value['login']?>" width="125px" height="125px">
                </div>
                <div class="infoMember">
                    <a href="../../src/pages/infoMembers.php?userId=<?=$value['userId']?>" style="color:black;"><?=$value['login']?></a>
                    <?php 
                        switch ($value['nomRole']) {
                            case 'admin':
                                ?>
                                    <p><span class="userStyle colorAdmin"><?=$value['nomRole']?></span></p>
                                <?php
                                break;
                            case 'moderateur':
                                ?>
                                    <p><span class="userStyle colorModo"><?=$value['nomRole']?></span></p>
                                <?php
                                break;
                            case 'auteur':
                                ?>
                                    <p><span class="userStyle colorAuteur"><?=$value['nomRole']?></span></p>
                                <?php
                                break;
                            case 'membre':
                                ?>
                                    <p><span class="userStyle colorMembre"><?=$value['nomRole']?></span></p>
                                <?php
                                break;
                        }
                    ?>
                </div>
            </div>
        <?php    
        }
    ?>
    
</section>
<?php
    require "../../src/common/footer.php";
?>
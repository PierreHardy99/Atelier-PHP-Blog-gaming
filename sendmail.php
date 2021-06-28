<?php 
    $dest = "pierre.hardy1999@gmail.com";
    $sujet = 'Activation du compte';
    $corp = '<!DOCTYPE html>
             <html lang="en">
             <head>
                 <meta charset="UTF-8">
                 <meta http-equiv="X-UA-Compatible" content="IE=edge">
                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
                 <title>Document</title>
             </head>
             <body>
                <h2>Bonjour</h2> 
                <p>votre compte a bien été crée, veuillez cliquez sur le lien ci-dessous pour activer votre compte !</p>
             </body>
             </html>';


    $headers = "From: brousselicorne@gmail.com";
    if (mail($dest,$sujet,$corp,$headers)) {
        echo 'email envoié';
    } else {
        echo 'pas envoié';
    }

?>
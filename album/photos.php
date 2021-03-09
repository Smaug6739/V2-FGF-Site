<?php
session_start();
?>

<!doctype html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>French Gaming Family</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />
        <meta content="Notre site web" property="og:title">
        <meta content="French Gaming Family" property="og:site_name">
        <meta content="http://french-gaming-family.fr/public/img/logo.png" property="og:image">
        <meta content="Ici vous pouvez poster vos photos prises en jeu. Vous avez toute la liberté de les embellir avec des filtres ou logiciels. Les plus belles œuvres seront sélectionnées chaque semaine pour rejoindre l'album photo de notre site internet! Tout les jeux sont acceptés !" property="og:description">
    </head>
    <body>
        <?php include "../include/nav.php"; ?>
        <?php include "../include/header.php"; ?>
        <main id="fond">
        <div id="album" class="container-fluid">
            <div class="row d-flex flex-column justify-content-center align-items-center">
                <div>
                    <ul id="A"style="text-align:center;">
                        <div class="hvrbox">
                            <img width="480px" height="268" src="../public/img_album/exemple.jpg" class="hvrbox-layer_bottom">
                                <div class="hvrbox-layer_top hvrbox-layer_slideup">
                                <div class="hvrbox-text">Auteur : USER</div>
                            </div>
                        </div>
                        
                        </div>
                    </ul>
                    <a href="https://french-gaming-family.fr/album/album.php" class="bouton4">Notre album photos</a>
                </div>
            </div>
        </div>
        </main>
        <!-- FOOTER -->
        <?php include '../include/footertest.php'; ?>
       
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../public/js/script.js"></script>
        <script src="../public/js/album.js"></script>
    </body>
</html>
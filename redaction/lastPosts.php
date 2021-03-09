<?php
session_start();
include '../models/last.php';
?>

<!doctype html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FGF- Rédaction</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />
        <meta content="Notre site web" property="og:title">
        <meta content="French Gaming Family" property="og:site_name">
        <meta content="https://french-gaming-family.fr/public/img-fond/banner-img.png" property="og:image">
        <meta content="Bienvenu sur le site de la FGF: French Gaming Family.Sur cette page des rédacteurs écrivent des articles pour nous faire découvrir de nouveaux sujets. Vous pouvez meme écrire vos propres articles !" property="og:description">
    </head>
    
    <body>
        <?php include "nav_redac.php"; ?>
        <?php include "../include/header.php"; ?>
        

        <div id="lastPostsAcc" class="container-fluid d-flex flex-column align-items-center p-0">
            <h1>Articles</h1>
            <div class="col-xl-12 d-flex flex-row justify-content-around flex-wrap">
                <?php echo $last; ?>
            </div>
        </div>
        
        <?php include '../include/footertest.php'; ?>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../public/js/script.js"></script>
        <script src="../public/js/last.js"></script>
    </body>
</html>
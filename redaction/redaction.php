<?php
session_start();
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
    </head>
    
    <body>
        <?php include "../include/header.php"; ?>
        
        <?php include "nav_redac.php"; ?>

        <div id="redaction" class="container-fluid">
            <fieldset class="form-group">

                <legend>Les rédactions</legend>
                    <h5>Ce sont des articles portant sur différents sujets et écrit par la communauté,<br>
                    le principe est que les membres qui sont inspirés par les sujets vont écrire des <br>
                    articles dessus.</h5>
                    <ul>
                        <h4 style="text-decoration:underline;">Dans ces articles vous pouvez donner votre avis sur un sujet mais il faut respecter des règles de bon sens :</h4>
                        <li><img src="../public/img/check.gif" class="GIF"> Être respectueux envers tout le monde. </li>
                        <li><img src="../public/img/check.gif" class="GIF"> Respecter le thème de la catégorie de chaque article </li>
                        <li><img src="../public/img/croix.gif" class="GIF"> Ne pas publier d'informations personnelles ne vous appartenant pas.</li>
                        <li><img src="../public/img/croix.gif" class="GIF"> Ne pas abuser des majuscules et des émoticones(emojis).</li>
                        <li><img src="../public/img/croix.gif" class="GIF"> Soyez originaux ! Ne pas copier coller des articles existants.</li>
                        <h4 style="text-decoration:underline;">Le language : </h4>
                        <li><img src="../public/img/croix.gif" class="GIF"> Pas de discours haineux</li>
                        <li><img src="../public/img/croix.gif" class="GIF"> Pas d'insultes</li>
                        <li><img src="../public/img/croix.gif" class="GIF"> Pas d'articles touchant la religion ou la politique</li>
                        <li><img src="../public/img/check.gif" class="GIF"> Soyez poli avec les autres membres </li>
                        <li><img src="../public/img/check.gif" class="GIF"> Tentez de vous adresser aux autres dans un langage correct</li>
                        <h4 style="text-decoration:underline;">Les catégories d’articles </h4>
                        <li><img src="../public/img/482704347772485662.gif" class="GIF"> Le salon partenaire est un salon réservé aux membres partenaires. Vous pouvez devenir partenaire en cliquant <a href="http://french-gaming-family.yj.fr/partenaire/partenaire.php">ici</a></li>
                    </ul>
            </fieldset>
        </div>
        
        <?php include '../include/footer.php'; ?>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../public/js/script.js"></script>
    </body>
</html>
<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: https://french-gaming-family.fr/login.php");
}

?>

<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <!--<link href='https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />
        <title>French Gaming Family</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script data-ad-client="ca-pub-6560315132389166" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />

    </head>

    <body>
        <?php include "nav_redac.php"; ?>
        <?php include "../include/header.php"; ?>
        <div class="container-fluid">
            <section>
            <fieldset class="form-group">
                        <legend>Informations</legend>
                        <ul>
                        <li>Les images : le format recommandé est de 1920x1080.Le format minimum conseillé est de 1280x720.<br>Si votre image n'est pas au bon format,votre publication peut se voir refusée.</li><br>
                        </ul>
            </fieldset>
                <form action="../models/albums.php" method="post" class="mt-5" id="create_form" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <div class="form-group d-flex flex-column">
                            <label style="font-size:20px;" for="fi_img2">Image numero 2 de votre article le format recommander est de 1920 × 1080 :</label>
                            <input type="file" class="form-control" id="fi_img2" name="fi_img2">
                        </div>
                        <div class="form-group d-flex flex-column">
                                <label for="in_auteur">Auteur</label>
                                <input type="text" class="form-control" id="in_auteur" name="in_auteur" placeholder="Auteur">
                        </div> 
                           
                    </fieldset>
                            
                    <input type="hidden" name="a" value="articles">
                    <input type="hidden" name="hi_userId" value="<?=$_SESSION["user"]?>">
                    <input type="hidden" name="hi_auteur" value="<?=$_SESSION["user"]?>">

                    <!--<div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>-->

                    <button id="btn_submit" type="submit" class="btn btn-primary"  onclick="upload_image();">Envoyer</button>
                    <div  class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>

                </form>
            </section>

        </div>
        <!-- FOOTER -->
        <?php include '../include/footer.php'; ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src="../public/js/functions.js"></script>
        <script src="../public/js/script.js"></script>
    </body>

    

</html>


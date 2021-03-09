<?php

session_start();

if(!isset($_SESSION['user'])) {

    header("Location: http://french-gaming-family.yj.fr/login.php");

}

?>



<!DOCTYPE html>

<html>

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />

        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />

        <title>French Gaming Family</title>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>



    <body>

        

        <?php include "../include/header.php"; ?>

        

        <?php include "nav_redac.php"; ?>



        <div class="container-fluid">

            <section>

                <form action="../models/articles.php" method="post" class="mt-5" id="create_form" enctype="multipart/form-data">

                    <fieldset class="form-group">

                        <legend>Informations</legend>

                        <div class="form-group d-flex flex-column">

                            <label for="se_cat">Catégorie de votre article :</label>

                            <select id="se_cat" name="se_cat">

                                <option value="1">Console</option>

                                <option value="2">Jeux</option>

                                <option value="3">Informatique</option>

                                <option value="4">Musique</option>

                                <option value="5">Partenaires</option>

                                <option value="6">Divers</option>

                            </select>

                        </div>

                    </fieldset>



                    <fieldset class="form-group">

                        <legend>Votre article</legend>

                        <div class="form-group d-flex flex-column">

                            <label for="in_title">Le titre de votre article</label>

                            <input type="text" class="form-control" id="in_title" name="in_title" placeholder="Titre">

                            <label for="ta_article">Ecrivez ci-dessous votre article :</label>

                            <textarea name="ta_article" id="ta_article" cols="40" rows="5"> </textarea>

                        </div>

                       

                        <div class="form-group d-flex flex-column">

                            <label for="fi_img">Image de l'article</label>

                            <input type="file" class="form-control" id="fi_img" name="fi_img">

                        </div>

                        

                        <div class='progress' id="progress_div">

                            <div class='bar' id='bar1'></div>

                            <div class='percent' id='percent1'>0%</div>

                        </div>

                        <div id='output_image'></div>

                    </fieldset>



                    <input type="hidden" name="a" value="articles">

                    <input type="hidden" name="hi_userId" value="<?=$_SESSION["user"]?>">



                    <div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>



                    <button id="btn_submit" type="submit" class="btn btn-primary"  onclick="upload_image();">Envoyer</button>

                    

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

        <script src="../public/js/post.js"></script>

    </body>

    

</html>


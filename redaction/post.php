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

    <body style="font-family: 'Arial;Helvetica Neue;Helvetica;sans-serif';">
        <?php include "nav_redac.php"; ?>
        <?php include "../include/header.php"; ?>
        <div class="container-fluid">
            <section>
            <fieldset class="form-group">
                        <legend>Informations</legend>
                        <ul>
                        <li>Les images : le format recommandé est de 1920x1080.Le format minimum conseillé est de 1280x720.<br>Si votre image n'est pas au bon format,votre publication peut se voir refusée.</li><br>
                        <li>Les paragraphes : Vous pouvez mettre en page vos articles grace au wysiwyg ou à l'aide d'une autre plateforme.</li><br>
                        <li>Les vidéos: Les seules vidéos autorisées sont les vidéos youtube.Vous devez copier/coller le lien de la vidéo pour pouvoir l'envoyer.</li>
                        </ul>
            </fieldset>
                <form action="../models/articles.php" method="post" class="mt-5" id="create_form" enctype="multipart/form-data">
                    
                    <fieldset class="form-group">
                        <legend>Type d'article</legend>
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
                            <div class="form-group d-flex flex-column">
                                <label style="font-size:20px;" for="fi_img">Image de l'article le format recommander est de 1920 × 1080 :</label>
                                <input type="file" class="form-control" id="fi_img" name="fi_img">
                            </div>

                            <label style="font-size:20px;" for="ta_article">Ecrivez ci-dessous le 1er paragraphe de votre article :</label>
                            <input type="hidden" name="ta_article" id="ta_article" value="">
                            <div id="editparent">
                                <div id='editControls' class="mb-2">
                                    
                                    <div class='btn-group'>
                                        <a class='btn btn-secondary' data-role='undo' href='#'><i class="fas fa-undo-alt"></i></a>
                                        <a class='btn btn-secondary' data-role='redo' href='#'><i class="fas fa-redo-alt"></i></a>
                                    </div>
                                    
                                    <div class='btn-group'>
                                        <a class='btn btn-secondary' data-role='bold' href='#'><b>Bold</b></a>
                                        <a class='btn btn-secondary' data-role='italic' href='#'><em>Italic</em></a>
                                        <a class='btn btn-secondary' data-role='underline' href='#'><u><b>U</b></u></a>
                                        <a class='btn btn-secondary' data-role='strikeThrough' href='#'><strike>abc</strike></a>
                                    </div>

                                    <div class='btn-group'>
                                        <a class='btn btn-secondary' data-role='justifyLeft' href='#'><i class="fas fa-align-left"></i></a>
                                        <a class='btn btn-secondary' data-role='justifyCenter' href='#'><i class="fas fa-align-center"></i></a>
                                        <a class='btn btn-secondary' data-role='justifyRight' href='#'><i class="fas fa-align-right"></i></a>
                                        <a class='btn btn-secondary' data-role='justifyFull' href='#'><i class="fas fa-align-justify"></i></a>
                                    </div>

                                    <div class='btn-group' id="none">
                                        <a class='btn btn-secondary' data-role='indent' href='#'><i class="fas fa-indent"></i></a>
                                        <a class='btn btn-secondary' data-role='outdent' href='#'><i class="fas fa-outdent"></i></a>
                                    </div>

                                    <div class='btn-group' id="none">
                                        <a class='btn btn-secondary' data-role='insertUnorderedList' href='#'><i class="fas fa-list-ul"></i></a>
                                        <a class='btn btn-secondary' data-role='insertOrderedList' href='#'><i class="fas fa-list-ol"></i></a>
                                    </div>

                                    <div class='btn-group' id="none">
                                        <a class='btn btn-secondary' data-role='h1' href='#'>h<sup>1</sup></a>
                                        <a class='btn btn-secondary' data-role='h2' href='#'>h<sup>2</sup></a>
                                        <a class='btn btn-secondary' data-role='p' href='#'>p</a>
                                    </div>

                                    <div class='btn-group' id="none">
                                        <a class='btn btn-secondary' data-role='subscript' href='#'><i class="fas fa-subscript"></i></a>
                                        <a class='btn btn-secondary' data-role='superscript' href='#'><i class="fas fa-superscript"></i></a>
                                    </div>
                                </div>

                                <div id='editor' style='' contenteditable>

                                </div>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-column">
                            <label style="font-size:20px;" for="fi_img2">Image numero 2 de votre article le format recommander est de 1920 × 1080 :</label>
                            <input type="file" class="form-control" id="fi_img2" name="fi_img2">
                        </div>

                        <label style="font-size:20px;" for="ta_article2">Ecrivez ci-dessous le 2eme paragraphe de votre article :</label>
                        <input type="hidden" name="ta_article2" id="ta_article2" value="">
                            <div id="editparent">
                                <div id='editControls_2' class="mb-2">
                                    <div class='btn-group'>
                                        <a class='btn btn-secondary' data-role='undo' href='#'><i class="fas fa-undo-alt"></i></a>
                                        <a class='btn btn-secondary' data-role='redo' href='#'><i class="fas fa-redo-alt"></i></a>
                                    </div>

                                    <div class='btn-group'>
                                        <a class='btn btn-secondary' data-role='bold' href='#'><b>Bold</b></a>
                                        <a class='btn btn-secondary' data-role='italic' href='#'><em>Italic</em></a>
                                        <a class='btn btn-secondary' data-role='underline' href='#'><u><b>U</b></u></a>
                                        <a class='btn btn-secondary' data-role='strikeThrough' href='#'><strike>abc</strike></a>
                                    </div>

                                    <div class='btn-group'>
                                        <a class='btn btn-secondary' data-role='justifyLeft' href='#'><i class="fas fa-align-left"></i></a>
                                        <a class='btn btn-secondary' data-role='justifyCenter' href='#'><i class="fas fa-align-center"></i></a>
                                        <a class='btn btn-secondary' data-role='justifyRight' href='#'><i class="fas fa-align-right"></i></a>
                                        <a class='btn btn-secondary' data-role='justifyFull' href='#'><i class="fas fa-align-justify"></i></a>
                                    </div>

                                    <div class='btn-group'id="none">
                                        <a class='btn btn-secondary' data-role='indent' href='#'><i class="fas fa-indent"></i></a>
                                        <a class='btn btn-secondary' data-role='outdent' href='#'><i class="fas fa-outdent"></i></a>
                                    </div>

                                    <div class='btn-group'id="none">
                                        <a class='btn btn-secondary' data-role='insertUnorderedList' href='#'><i class="fas fa-list-ul"></i></a>
                                        <a class='btn btn-secondary' data-role='insertOrderedList' href='#'><i class="fas fa-list-ol"></i></a>
                                    </div>

                                    <div class='btn-group'id="none">
                                        <a class='btn btn-secondary' data-role='h1' href='#'>h<sup>1</sup></a>
                                        <a class='btn btn-secondary' data-role='h2' href='#'>h<sup>2</sup></a>
                                        <a class='btn btn-secondary' data-role='p' href='#'>p</a>
                                    </div>

                                    <div class='btn-group'id="none">
                                        <a class='btn btn-secondary' data-role='subscript' href='#'><i class="fas fa-subscript"></i></a>
                                        <a class='btn btn-secondary' data-role='superscript' href='#'><i class="fas fa-superscript"></i></a>
                                    </div>
                                </div>

                                <div id='editor2' style='' contenteditable>

                                </div>
                            </div>

                            <div class="form-group d-flex flex-column">
                                <label style="font-size:20px;" for="in_vid">Vidéo :(optionel)</label>
                                <input type="text" class="form-control" id="in_vid" name="in_vid" placeholder="EX : https://www.youtube.com/watch?v=QHcfgqIxFwQ">
                                    <label for="in_auteur">Auteur</label>
                                    <input type="text" class="form-control" id="in_auteur" name="in_auteur" placeholder="Auteur">
                            </div>                        
                            <div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>
                            
                        </div>
                    </fieldset>

                    <input type="hidden" name="a" value="articles">

                    <input type="hidden" name="hi_userId" value="<?=$_SESSION["user"]?>">
                    <input type="hidden" name="hi_auteur" value="<?=$_SESSION["user"]?>">

                    <!--<div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>-->

                    <button id="btn_submit" type="submit" class="btn btn-primary"  onclick="upload_image();">Envoyer</button>
                </form>
            </section>

        </div>
        <!-- FOOTER -->
        <?php include '../include/footertest.php'; ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src="../public/js/functions.js"></script>
        <script src="../public/js/script.js"></script>
        <script src="../public/js/post.js"></script>
    </body>

    

</html>


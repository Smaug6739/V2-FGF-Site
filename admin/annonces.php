<?php
session_start();

if(!isset($_SESSION["admin"])) {
    header("Location: https://french-gaming-family.fr/login.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>FGF - Admin</title>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Anton|Dancing+Script|Exo|Lobster|Macondo+Swash+Caps|Pacifico|Shadows+Into+Light&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="../public/css/admin.css"/>
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>-->
        <!--<link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">-->
        <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />-->
        <!--<link href='https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css' rel='stylesheet' type='text/css'>-->


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

    
       
        
        <title>French Gaming Family</title>
        <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->

    </head>

    <body>
      
        <?php include 'nav.php'; ?>
        
        <section class="container-fluid pl-0 pr-0">
            
            <section class="col-xl-12 pt-5">

                <div class="row col-xl-12">
                    <form class="col-xl-8 mx-auto" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="in_title">Titre</label>
                            <input type="text" class="form-control" id="in_title" name="in_title" placeholder="Titre de l'annonce">
                        </div>
                        <div class="form-group">
                            <label for="in_link">Lien externe</label>
                            <input type="text" class="form-control" id="in_link" name="in_link" placeholder="Lien externe">
                        </div>
                        <div class="form-group">
                            <label for="in_linkTitle">Titre du lien externe</label>
                            <input type="text" class="form-control" id="in_linkTitle" name="in_linkTitle" placeholder="Titre du lien externe">
                        </div>
                        <div class="form-group">
                            <label for="ta_annonce">Example textarea</label>
                            <textarea type="hidden" class="form-control" id="ta_annonce" name="ta_annonce" rows="3"></textarea>
                        </div>
                        <!--
                        <input type="hidden" name="ta_annonce" id="ta_annonce" value="">
                        <label for="ta_annonce">Example textarea</label>
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

                                <div name="ta_annonce" id='editor2' style='' contenteditable>

                                </div>
                            </div>
                            -->
                            <fieldset class="form-group">
                        <div class="form-group d-flex flex-column">
                            <input type="hidden" name="ta_annonce" id="ta_annonce" value="">
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
                    </fieldset>




                        
                        <button type="submit" name="submit" id="btn_submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
                
                <div id="annonceContent" class="row col-xl-12 d-flex justify-content-around flex-wrap">
                    
                </div>

            </section><!-- /.container -->
        </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="../public/js/admin/main.js"></script>
    <script type="text/javascript" src="../public/js/admin/annonces.js"></script>
    <script src="../public/js/functions.js"></script>
    <script src="../public/js/script.js"></script>
    <script src="../public/js/post.js"></script>


    </body>
</html>



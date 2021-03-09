<?php

session_start();



if(!isset($_SESSION["admin"])) {

    header("Location: https://french-gaming-family.fr/login.php");

}



include "../classes/Demande.php";

include "../classes/Articles.php";



?>



<!DOCTYPE html>

<html>

    <head>

        <title>FGF - Admin</title>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

        <link href="https://fonts.googleapis.com/css?family=Anton|Dancing+Script|Exo|Lobster|Macondo+Swash+Caps|Pacifico|Shadows+Into+Light&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>

        <link rel="stylesheet" href="../public/css/admin.css"/>

    </head>



    <body>

        

        <?php include 'nav.php'; ?>

        

        <section class="container-fluid pl-0 pr-0">



            <section class="col-xl-12 text-center">

                

                <div id="pending-posts" class="container-fluid d-flex flex-column align-items-center p-0">

                    <h1 class="mt-5">Articles en attente</h1>

                    <div class="col-xl-12 d-flex flex-row justify-content-around flex-wrap">

                        <?php

                        

                        $aff = '';

                        if($list = Articles::getPending()) {



                            foreach ($list as $value) {

                                $Article = new Articles($value->id);

                                //

                                $aff .= '<div class="card article col-xl-5 pt-0 pb-3 mb-3">';
                                $aff .= '<h6 style="font-size:16px">Status : <span class="badge badge-warning">En attente</span></h6>                                ';
                                $aff .= '    <img src="../redaction/imgs/'.$Article->getImg().'" class="card-img-top">';

                                $aff .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';

                                $aff .= '       <h5 class="card-title mt-3">'.mb_strtoupper($Article->getTitle()).'</h5>';

                                $aff .= '       <p class="card-text mt-3>'.$Article->getContent().'</p>';

                                $aff .= '    <img src="../redaction/imgdeux/'.$Article->getImg2().'" class="card-img-top">';

                                $aff .= '       <p class="card-text mt-3">'.$Article->getContent2().'</p>';

                                if ($Article->getVid()) {
                                    $aff .= '<iframe src="'.$Article->getEmbed().'" width="560" height="315" allowfullscreen></iframe>';
                                }
                                if($Article->getAuteur()){
                                    $aff .= '    <p style="font-style:italic">'."Poster par  ".$Article->getAuteur(). " le ". $Article->getDate() .'</p>';
                                 }
                                $aff .= "<button id='treatment_btn_".$value->id."' data-id='".$value->id."' class='btn btn-success treatment-btn  pb-1 mb-2'>Traiter</button>";

                                $aff .= "<button id='del_btn_".$value->id."' data-pseudo='".$Article->getUserLogin()."' data-id='".$value->id."' class='btn btn-danger del-btn pb-1 mb-2'>Supprimer</button>";

                                $aff .= '       <h5 class="mt-1">Catégorie de l\'article : '.mb_strtoupper($Article->getCategory()).'</h5>';

                                $aff .= '    </div>';

                                $aff .= '</div>';


                            }

                            

                        } else {

                            $aff .= '<div class="card article col-xl-3 pt-3 pb-3">';

                            $aff .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';

                            $aff .= '       <h5 class="card-title mt-3">Aucun article en attente</h5>';

                            $aff .= '    </div>';

                            $aff .= '</div>';

                        }

                        

                        echo $aff;

                        

                        ?>

                    </div>

                </div>

                

                <div id="achieved-posts" class="container-fluid d-flex flex-column align-items-center p-0">

                    <h1 class="mt-5">Articles traitées</h1>

                    <div class="col-xl-12 d-flex flex-row justify-content-around flex-wrap">

                        <?php

                        

                        $aff2 = '';





                        if($list = Articles::getAchieved()) {



                            foreach ($list as $value) {

                                $Article = new Articles($value->id);



                               /* $aff2 .= '<div class="card article col-xl-8 pt-3 pb-3 mb-3">';

                                $aff2 .= '    <img src="../redaction/imgs/'.$Article->getImg().'" class="card-img-top">';

                                $aff2 .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';

                                $aff2 .= '       <h5 class="card-title mt-3">'.mb_strtoupper($Article->getTitle()).'</h5>';

                                $aff2 .= '       <p class="card-text mt-3">'.$Article->getContent().'</p>';

                                $aff2 .= '    <img src="../redaction/imgdeux/'.$Article->getImg2().'" class="card-img-top">';

                                $aff2 .= '       <p class="card-text mt-3">'.$Article->getContent2().'</p>';
                                if ($Article->getVid()) {
                                    $aff2 .= '<iframe src="'.$Article->getEmbed().'" width="560" height="315" allowfullscreen></iframe>';
                                }

                                $aff2 .= "<button id='del_btn_".$value->id."' data-pseudo='".$Article->getUserLogin()."' data-id='".$value->id."' class='btn btn-danger del-btn'>Supprimer</button>";

                                $aff2 .= '    </div>';

                                $aff2 .= '</div>';*/
                                $aff2 .= '<div class="card article col-xl-5 pt-0 pb-3 mb-3">';
                                $aff2 .= '<h6 style="font-size:16px">Status : <span class="badge badge-success">Traiter</span></h6>                                ';
                                $aff2 .= '    <img src="../redaction/imgs/'.$Article->getImg().'" class="card-img-top">';

                                $aff2 .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';

                                $aff2 .= '       <h5 class="card-title mt-3">'.mb_strtoupper($Article->getTitle()).'</h5>';

                                $aff2 .= '       <p class="card-text mt-3">'.$Article->getContent().'</p>';

                                $aff2 .= '    <img src="../redaction/imgdeux/'.$Article->getImg2().'" class="card-img-top">';

                                $aff2 .= '       <p class="card-text mt-3">'.$Article->getContent2().'</p>';

                                if ($Article->getVid()) {
                                    $aff2 .= '<iframe src="'.$Article->getEmbed().'" width="560" height="315" allowfullscreen></iframe>';
                                }
                                if($Article->getAuteur()){
                                    $aff2 .= '    <p style="font-style:italic">'."Poster par  ".$Article->getAuteur(). " le ". $Article->getDate() .'</p>';
                                 }
                                $aff2 .= "<button id='treatment_btn_".$value->id."' data-id='".$value->id."' class='btn btn-success treatment-btn  pb-1 mb-2'>Traiter</button>";

                                $aff2 .= "<button id='del_btn_".$value->id."' data-pseudo='".$Article->getUserLogin()."' data-id='".$value->id."' class='btn btn-danger del-btn pb-1 mb-2'>Supprimer</button>";

                                $aff2 .= '       <h5 class="mt-1">Catégorie de l\'article : '.mb_strtoupper($Article->getCategory()).'</h5>';

                                $aff2 .= '    </div>';

                                $aff2 .= '</div>';

                            }

                            

                        } else {

                            $aff2 .= '<div class="card article col-xl-3 pt-3 pb-3">';

                            $aff2 .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';

                            $aff2 .= '       <h5 class="card-title mt-3">Aucun article</h5>';

                            $aff2 .= '    </div>';

                            $aff2 .= '</div>';

                        }

                        

                        echo $aff2;

                        

                        ?>

                    </div>

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

    <script type="text/javascript" src="../public/js/admin/main.js"></script>

    <script type="text/javascript" src="../public/js/admin/posts.js"></script>

    </body>

</html>


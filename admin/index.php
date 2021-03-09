<?php

session_start();



if(!isset($_SESSION["admin"])) {

    header("Location: https://french-gaming-family.fr/login.php");

}



include "../classes/Demande.php";



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

            

            <section class="col-xl-12 pt-5">



                <div class="row">

                    <div class="col-sm-12 col-xl-3">

                        <div class="card mt-5 mx-auto" style="width: 18rem;">

                            <a class="link m-0 p-0" href="demandes.php">

                                <!--<img src="../public/img/Discord.png" width="100%" class="card-img-top" alt="...">-->
                                <img src="../public/img/logo.png" width="100%" class="card-img-top" alt="...">


                            

                                <div class="card-body">

                                    <p class="card-text">Demande Discord en attente</p>

                                    <p id="nb-demandes" class="card-text-nb"></p>

                                </div>

                            </a>

                        </div>

                    </div>

                    <div class="col-sm-12 col-xl-3">

                        <div class="card mt-5 mx-auto" style="width: 18rem;">

                            <a class="link m-0 p-0" href="articles.php">

                                <img src="../public/img/logo.png" width="100%" class="card-img-top" alt="...">

                                <div class="card-body">

                                    <p class="card-text">Articles en attente</p>

                                    <p id="nb-articles" class="card-text-nb"></p>

                                </div>

                            </a>

                        </div>

                    </div>

                    <div class="col-sm-12 col-xl-3">

                        <div class="card mt-5 mx-auto" style="width: 18rem;">

                            <a class="link m-0 p-0" href="partenariat.php">

                                <img src="../public/img/logo.png" width="100%" class="card-img-top" alt="...">

                                <div class="card-body">

                                    <p class="card-text">Partenariat en attente</p>

                                    <p id="nb-partner" class="card-text-nb"></p>

                                </div>

                            </a>

                        </div>

                    </div>

                    <div class="col-sm-12 col-xl-3">

                        <div class="card mt-5 mx-auto" style="width: 18rem;">

                            <a class="link m-0 p-0" href="staff.php">

                                <img src="../public/img/logo.png" width="100%" class="card-img-top" alt="...">

                                <div class="card-body">

                                    <p class="card-text">Staff en attente</p>

                                    <p id="nb-staff" class="card-text-nb"></p>

                                </div>

                            </a>

                        </div>

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

    <script type="text/javascript" src="../public/js/admin.js"></script>

    </body>

</html>


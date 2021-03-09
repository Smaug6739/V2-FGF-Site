<?php
session_start();

if(!isset($_SESSION["admin"])) {
    header("Location: http://french-gaming-family.yj.fr/login.php");
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

            <section class="col-xl-12 text-center">



                <h1 class="mt-5">Liste des utilisateurs</h1>

                <table id="users" class="table table-striped table-bordered col-12 col-xl-7">

                </table>

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
    <script type="text/javascript" src="../public/js/admin/users.js"></script>
    </body>
</html>

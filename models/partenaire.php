<?php



include '../classes/Partenaire.php';

?>



<!doctype html>

<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>French Gaming Family</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />

        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />

    </head>

    

    <body>

        <?php include "../include/header.php"; ?>

        

        <?php include "../include/nav.php"; ?>



        <main role="main">



            <div class="container-fluid d-flex flex-row justify-content-center align-items-center pt-5">

                

                <?php



                if(isset($_POST['submit'])) {



                    insertPartenaire();

                }



                ?>

                

            </div>

            

        </main>

        

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script src="../public/js/script.js"></script>

        <script src="../public/js/partenaire_submit.js"></script>

    </body>

</html>



<?php



function insertPartenaire() {

    

    $aff = '';

    $error = 0;

    

    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);

    $mail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $majeur = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);

    $q1 = filter_input(INPUT_POST, 'q1', FILTER_SANITIZE_SPECIAL_CHARS);

    $q2 = filter_input(INPUT_POST, 'q2', FILTER_SANITIZE_SPECIAL_CHARS);

    $q3 = filter_input(INPUT_POST, 'q3', FILTER_SANITIZE_SPECIAL_CHARS);

    $q4 = filter_input(INPUT_POST, 'q4', FILTER_SANITIZE_SPECIAL_CHARS);

    $q5 = filter_input(INPUT_POST, 'q5', FILTER_SANITIZE_SPECIAL_CHARS);

    $q6 = filter_input(INPUT_POST, 'q6', FILTER_SANITIZE_SPECIAL_CHARS);

    

    if(empty($pseudo)) {

        //error_log("error 1", 0);

        $aff .= '<h2>Pseudo invalide</h2>';

        $error++;

    }

    

    if(empty($mail)) {

        //error_log("error 2", 0);

        $aff .= '<h2>Email invalide</h2>';

        $error++;

    }

    

    if(empty($majeur)) {

        $majeur = 0;

    }

    

    if(empty($q1)) {

        //error_log("error 3", 0);

        $aff .= '<h2>Votre réponse à la question n° 1 est invalide</h2>';

        $error++;

    }

    

    if(empty($q2)) {

        //error_log("error 4", 0);

        $aff .= '<h2>Votre réponse à la question n° 2 est invalide</h2>';

        $error++;

    }

    

    if(empty($q3)) {

        //error_log("error 5", 0);

        $aff .= '<h2>Votre réponse à la question n° 3 est invalide</h2>';

        $error++;

    }

    

    if(empty($q4)) {

        //error_log("error 6", 0);

        $aff .= '<h2>Votre réponse à la question n° 4 est invalide</h2>';

        $error++;

    }

    

    if(empty($q5)) {

        //error_log("error 7", 0);

        $aff .= '<h2>Votre réponse à la question n° 5 est invalide</h2>';

        $error++;

    }

    

    if(empty($q6)) {

        //error_log("error 8", 0);

        $aff .= '<h2>Votre réponse à la question n° 6 est invalide</h2>';

        $error++;

    }

    

    if($error === 0) {

        

        $Partenaire = new Partenaire();

        $Partenaire->setPseudo($pseudo);

        $Partenaire->setMail($mail);

        $Partenaire->setMajeur($majeur);

        $Partenaire->setQ1($q1);

        $Partenaire->setQ2($q2);

        $Partenaire->setQ3($q3);

        $Partenaire->setQ4($q4);

        $Partenaire->setQ5($q5);

        $Partenaire->setQ6($q6);

        $Partenaire->setStatut(0);

        

        if($Partenaire->insert()) {

            echo "<h2>Demande envoyée. Votre demande sera traitée dans les plus brefs délais.</h2>";

        } else {

            echo "<h2>Un problème est survenu, contactez l'administration.</h2>";

        }

        

    } else {

        echo $aff;

    }

}
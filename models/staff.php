<?php



include '../classes/Staff.php';

?>



<!doctype html>

<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        

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



                    insertStaff();

                }



                ?>

                

            </div>

            

        </main>

        

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    </body>

</html>



<?php



function insertStaff() {

    

    $aff = '';

    $error = 0;

    $captcha;

    

    

    if(isset($_POST['g-recaptcha-response'])){

        $captcha = $_POST['g-recaptcha-response'];

    } else {

        $error++;

        $errorStr .= "Le reCaptcha n'a pas été validé.<br>";

    }

    

    $secretKey = "<SECRET_RECAPTCHA_KEY>";

    $ip = $_SERVER['REMOTE_ADDR'];

    

    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);

    $response = file_get_contents($url);

    $responseKeys = json_decode($response,true);

    

    if($responseKeys["success"]) {

       

        $pseudo = filter_input(INPUT_POST, 'in_pseudo', FILTER_SANITIZE_SPECIAL_CHARS);

        $mail = filter_input(INPUT_POST, 'in_mail', FILTER_SANITIZE_EMAIL);

        $majeur = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);

        $games = implode(",", $_POST["se_games"]);

        $q1 = filter_input(INPUT_POST, 'q1', FILTER_SANITIZE_SPECIAL_CHARS);

        $q2 = filter_input(INPUT_POST, 'q2', FILTER_SANITIZE_SPECIAL_CHARS);

        $q3 = filter_input(INPUT_POST, 'q3', FILTER_SANITIZE_SPECIAL_CHARS);

        $q4 = filter_input(INPUT_POST, 'q4', FILTER_SANITIZE_SPECIAL_CHARS);

        $q5 = filter_input(INPUT_POST, 'q5', FILTER_SANITIZE_SPECIAL_CHARS);

        $q6 = filter_input(INPUT_POST, 'q6', FILTER_SANITIZE_SPECIAL_CHARS);



        if(empty($pseudo)) {

            $aff .= '<h2>Pseudo invalide</h2>';

            $error++;

        }



        if(empty($mail)) {

            $aff .= '<h2>Email invalide</h2>';

            $error++;

        }

        

        if(empty($majeur)) {

            $majeur = 0;

        }



        if(empty($q1)) {

            $aff .= '<h2>Votre réponse à la question n° 1 est invalide</h2>';

            $error++;

        }



        if(empty($q2)) {

            $aff .= '<h2>Votre réponse à la question n° 2 est invalide</h2>';

            $error++;

        }



        if(empty($q3)) {

            $aff .= '<h2>Votre réponse à la question n° 3 est invalide</h2>';

            $error++;

        }



        if(empty($q4)) {

            $aff .= '<h2>Votre réponse à la question n° 4 est invalide</h2>';

            $error++;

        }



        if(empty($q5)) {

            $aff .= '<h2>Votre réponse à la question n° 5 est invalide</h2>';

            $error++;

        }



        if(empty($q6)) {

            $aff .= '<h2>Votre réponse à la question n° 6 est invalide</h2>';

            $error++;

        }





        if($error === 0) {



            $Staff = new Staff();

            $Staff->setPseudo($pseudo);

            $Staff->setMail($mail);

            $Staff->setMajeur($majeur);

            $Staff->setGames($games);

            $Staff->setQ1($q1);

            $Staff->setQ2($q2);

            $Staff->setQ3($q3);

            $Staff->setQ4($q4);

            $Staff->setQ5($q5);

            $Staff->setQ6($q6);

            $Staff->setStatut(0);



            if($Staff->insert()) {

                echo "<h2>Demande envoyée</h2><br><p>Votre demande sera traitée dans les plus brefs délais.</p>";

            } else {

                echo "<h2>Un problème est survenu, contactez l'administration.</h2>";

            }



        } else {

            

            echo $aff;

        }

    } else {

        echo "<h2>Vous n'avez pas validé la vérification reCAPTCHA</h2>";

    }

    

    

}
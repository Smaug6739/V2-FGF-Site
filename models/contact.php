<?php
session_start();
include "../classes/Demande.php";
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

        <?php include ("../include/nav.php"); ?>
        
        <div class="container-fluid d-flex flex-row justify-content-center align-items-center pt-5">

            <?php

            if(isset($_POST["a"]) && !empty($_POST["a"])) {
                $action = htmlspecialchars($_POST["a"]);

                switch($action) {
                    case "demande":
                        insertDemande();
                        break;
                }
            }

            ?>

        </div>
            
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="public/js/script.js"></script>
        <script src="public/js/contact.js"></script>
    </body>
</html>

<?php

function insertDemande() {
    $error = 0;
    $errorStr = "";
    $name = "";
    $mail = "";
    $message = "";
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
        
        //error_log("response success", 0);
        
        $name = filter_input(INPUT_POST, 'in_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'in_mail', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'ta_message', FILTER_SANITIZE_SPECIAL_CHARS);
            
        if(empty($name)) {
            $error++;
            $errorStr .= "Le champs nom/raison sociale n'a pas été renseigné.<br>";
        }

        if(empty($mail)) {
            $error++;
            $errorStr .= "Le champs mail n'a pas été renseigné.<br>";
        }

        if(empty($message)) {
            $error++;
            $errorStr .= "Le message ne peut être vide.";
        }

        if($error === 0) {
            
            //error_log("error 0", 0);

            $Demande = new Demande();
            $Demande->setPseudo($name);
            $Demande->setMail($mail);
            $Demande->setDemande($message);
            $Demande->setStatut(0);
            
            //error_log("before insert", 0);

            if($Demande->insert()) {
                //error_log("insert ok", 0);
                echo '<h2>Demande envoyée !</h2>';
            } else {
                //error_log("insert ko", 0);
                echo '<h2>Echec de l\'envoi de la demande</h2>';
            }

        } else {
            echo '<h2>'.$errorStr.'</h2>';
        }
        
    } else {
            echo '<h2>Vous avez été détecté comme spam !</h2>';
    }
    

    
}


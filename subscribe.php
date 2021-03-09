<?php
session_start();
?>

<!doctype html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>French Gaming Family</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/css/main.css" type="text/css" media="screen" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>
    
    <body>
        <?php include "include/header.php"; ?>
        
        <?php include "include/nav.php"; ?>

        <main role="main">

            <div class="container-fluid">

                <?php
                    if(isset($_GET["e"]) && !empty($_GET["e"])) {
                        $e = filter_input(INPUT_GET, "e", FILTER_SANITIZE_NUMBER_INT);
                        $m = filter_var($e, FILTER_VALIDATE_INT);
                        
                        if(!empty($m)) {
                            switch ($m) {
                                case 1:
                                    echo '<h2>Inscription réussie !</h2>';
                                    break;
                                case 2:
                                    echo '<h2>Vous êtes déjà inscrit !</h2>';
                            }
                        }
                    }
                ?>
                
            </div>

        </main>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="public/js/script.js"></script>
    </body>
</html>
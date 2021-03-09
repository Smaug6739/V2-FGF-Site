<?php

session_start();

include "../classes/Albums.php";

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
            <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen"/>
            <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen"/>
        </head>

        <body>
            <?php include "../include/header.php"; ?>
            <?php include "../include/nav.php"; ?>
            <main role="main">
                <div class="container-fluid d-flex flex-row justify-content-center align-items-center pt-5">

                    <?php

                    if (isset($_POST["a"]) && !empty($_POST["a"])) {

                        $action = htmlspecialchars($_POST["a"]);

                        switch ($action) {

                            case "articles":
                                insertArticle();
                                break;
                        }
                    }

                    ?>

                </div>
            </main>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="public/js/script.js"></script>
            <script src="public/js/contact.js"></script>
        </body>
    </html>


<?php


function insertArticle()
{

    $error = 0;
    $errorStr = "";
    $userId = "";
    $auteur = "";

    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    } else {
        $error++;
        $errorStr .= "Le reCaptcha n'a pas été validé.<br>";
    }

    $secretKey = "<SECRET_RECAPTCHA_KEY>";
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {

        $dossier = '../album/imgs/';
        $fichier = basename($_FILES['fi_img']['name']);
        $taille_maxi = 200000;
        $taille = filesize($_FILES['fi_img']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['fi_img']['name'], '.');
        $userId = filter_input(INPUT_POST, 'hi_userId', FILTER_VALIDATE_INT);
        $auteur = filter_input(INPUT_POST, 'in_auteur', FILTER_SANITIZE_SPECIAL_CHARS);


        if (empty($userId)) {
            $error++;
            $errorStr .= "Vous n'etes pas connecté.<br>";
        }
        }

        if (!in_array($extension, $extensions)) {
            $error++;
            $errorStr .= 'Image 1 : Vous devez uploader un fichier de type png, gif, jpg, jpeg ...';
        }


        if ($error === 0) {

            $newName = uniqid();
            $newName2 = uniqid();
            $fichier = $newName . $extension;
            $fichier_deux = $newName2 . $extension_deux;

            if (!move_uploaded_file($_FILES['fi_img']['tmp_name'], $dossier . $fichier)) {

                $error++;
                $errorStr .= 'Echec de l\'upload du fichier';
            } else {
                switch ($extension) {
                    case ".jpg":
                    case ".jpeg":
                        convertImageJpg($dossier . $fichier, $dossier . $fichier, 1280, 720, 100);
                        break;
                    case ".png":
                        convertImagePng($dossier . $fichier, $dossier . $fichier, 1280, 720, 100);
                        break;
                }

            }

          
        }


        if ($error === 0) {

            $Article = new Articles();
            $Article->setUserId($userId);
            $Article->setImg($fichier);
            $Article->setAuteur($auteur);
            $Article->setStatut(0);

            if ($Article->insert()) {

                echo '<h2>Article envoyé !</h2>';
            } else {

                echo '<h2>Echec de l\'envoi de l\'article</h2>';
            }

        } else {

            echo '<h2>' . $errorStr . '</h2>';
        }

    } else {

        echo '<h2>Vous avez été détecté comme spam !</h2>';
    }


}


function convertImageJpg($source, $dest, $width, $height, $quality)
{

    $imageSize = getimagesize($source); // [0]=> width, [1]=> height
    $imageRessource = imagecreatefromjpeg($source);
    $imageFinale = imagecreatetruecolor($width, $height);
    $final = imagecopyresampled($imageFinale, $imageRessource, 0, 0, 0, 0, $width, $height, $imageSize[0], $imageSize[1]);
    imagejpeg($imageFinale, $dest, $quality);

}

function convertImagePng($source, $dest, $width, $height, $quality)
{

    $imageSize = getimagesize($source); // [0]=> width, [1]=> height
    $imageRessource = imagecreatefrompng($source);
    $imageFinale = imagecreatetruecolor($width, $height);
    $final = imagecopyresampled($imageFinale, $imageRessource, 0, 0, 0, 0, $width, $height, $imageSize[0], $imageSize[1]);
    imagepng($imageFinale, $dest, $quality);

}




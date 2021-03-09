<?php
session_start();
include '../classes/Annonces.php';
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../public/css/mediaQueries.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Notre site web" property="og:title">
        <meta content="French Gaming Family" property="og:site_name">
        <script data-ad-client="ca-pub-6560315132389166" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />

        <meta content="https://french-gaming-family.fr/public/img-fond/banner-img.png" property="og:image">
        <meta content="Bienvenu sur le site de la FGF: French Gaming Family.Sur cette page vous trouverez toute l'actualité llié a notre serveur discord, nos réseaux ou notre communauté" property="og:description">
    </head>
    
    <body>
        <?php include "../include/nav.php"; ?>
        <?php include "../include/header.php"; ?>

    <main id="fond">
   

        <div id="annonces" class="container-fluid">
            
            <div id="annonceContent" class="row col-xl-12 d-flex justify-content-around flex-wrap m-0">

                <?php
                    $aff = '';
    
                    if($list = Annonces::getAnnonces()) {
                        foreach ($list as $value) {
                            $Annonce = new Annonces($value->id);

                            $aff .= '<div class="card annonces col-xl-3 p-0 mt-3 text-center">';
                            //$aff .= '    <img src="..." class="card-img-top" alt="...">';
                            $aff .= '    <div class="card-body">';
                            $aff .= '       <h5 class="card-title">'.$Annonce->getTitle().'</h5>';
                            $aff .= '       <h6 class="card-subtitle mb-2 text-muted">'.$Annonce->getAdminLogin().'</h6>';
                            $aff .= '       <p class="card-text">'.$Annonce->getAnnonce().'</p>';
                            $aff .= '    </div>';
                            $aff .= '    <ul class="list-group list-group-flush">';
                            
                            if(!empty($Annonce->getLink())) {
                                $aff .= '       <li class="list-group-item"><a href="'.$Annonce->getLink().'" class="btn btn-primary">'.$Annonce->getLink_title().'</a></li>';
                            }
                            
                            $aff .= '       <li class="list-group-item">Annonce postée le '.$Annonce->getDate().'</li>';
                            $aff .= '    </ul>';
                            $aff .= '</div>';
                        }
                    } else {
                        $aff .= '<div class="card col-xl-12 p-0">';
                        //$aff .= '    <img src="..." class="card-img-top" alt="...">';
                        $aff .= '    <div class="card-body">';
                        $aff .= '       <h5 class="card-title">Aucune annonces</h5>';
                        $aff .= '    </div>';
                        $aff .= '</div>';
                    }

                    echo $aff;
                ?>
            </div>
        </div>
        <div style="text-align:center;">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- annoncesBaniere -->
            <ins class="adsbygoogle"
                style="display:inline-block;width:728px;height:90px"
                data-ad-client="ca-pub-6560315132389166"
                data-ad-slot="4560179739"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
    </div>
    </main>
        <?php include '../include/footertest.php'; ?>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../public/js/script.js"></script>
        <script src="../public/js/infos.js"></script>
    </body>
</html>
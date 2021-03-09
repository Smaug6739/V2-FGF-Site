<?php
session_start();
include 'models/lastAcc.php';
//var_dump($_SESSION);
?>
<!--Test-->
<!doctype html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>French Gaming Family</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="public/css/mediaQueries.css" type="text/css" media="screen" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <meta name="description" content="French Gaming Family la communauté multigaming francophone">
        <meta name="Category" content="Site Gaming">
        <meta content="Notre site web" property="og:title">
        <meta content="French Gaming Family" property="og:site_name">
        <meta content="https://french-gaming-family.fr/public/img-fond/banner-img.png" property="og:image">      

        <meta content="Bienvenu sur le site de la FGF: French Gaming Family. Nous sommes une communauté multi-gaming francophone de joueurs et créateurs de contenu adultes, réunis sur un même serveur Discord." property="og:description">
        <meta name="msvalidate.01" content="7C7EC0EDC71E20EB808536B3745497F9" />
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />
        <!--<script data-ad-client="ca-pub-6560315132389166" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
        <link href="http://fr.allfont.net/allfont.css?fonts=pacifico" rel="stylesheet" type="text/css" />

    </head>
    
    <body >
        <?php include "include/nav.php"; ?>

        <div id="tel">
            <img src="public/img/top-banner.jpg">
        </div>
       <section id="Gimg" style="text-align:center">
            <div id="auto">
                <!--<img class="t" src="public/img-fond/banner-img.png"><br>
                <img class="t" src="public/img-fond/logo.png">-->
                <!--<h5 style="color:blue;">Test</h5>-->
            </div>
        </section>
            
            
            
        <section id="Fond">
            <div id="index" class="container-fluid p-0">
                
                <div id="lastAnnoncesAcc" class="container-fluid d-flex flex-column align-items-center p-0">
                    <h1 class="sec-title"><img style="max-width:12%;" src="public/img/flechen.png">ANNONCES</h1>
                    <div class="col-xl-12 d-flex flex-row justify-content-around flex-wrap">
                        <?php echo $aff2; ?>
                    </div>
                   <div style="text-align:center;" id="pubs">
                   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- indexBaniere -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:728px;height:90px"
                        data-ad-client="ca-pub-6560315132389166"
                        data-ad-slot="7931560488"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                   </div>
                </div>
            
                <div id="lastPostsAcc" class="container-fluid d-flex flex-column align-items-center p-0">
                    <h1 class="sec-title"><img style="max-width:12%;" src="public/img/flechen.png">ARTICLES</h1>
                    <div class="col-xl-12 d-flex flex-row justify-content-around flex-wrap">
                        <?php echo $aff; ?>
                    </div>
                </div>

                <div id="social" class="d-flex flex-column align-items-center col-lg-12">

                    <div id="social" class="d-flex flex-column align-items-center col-lg-12">
                        <div class="d-flex flex-row justify-content-around col-lg-6">
                            <!--<a href="#" target="_blank" title="Twitch"><img src="public/img/0.png" alt="Twitch" class="Twitch"></a>-->
                            <a href="https://twitter.com/FGamingFamily" target="_blank" title="Twitter"><img src="public/img/1.png" alt="Twitter" class="Twiter"></a>
                            <a href="https://www.facebook.com/FrenchGamingFamily/" target="_blank" title="Facebook"><img src="public/img/4.png" alt="Facebook" class="Facebook"></a>
                            <a href="https://discord.gg/RjhsJXd" target="_blank" title="Discord"><img src="public/img/3.png" alt="Discord" class="Discord"></a>
                            <a href="https://www.instagram.com/french_gaming_family/" target="_blank" title="Instagram"><img src="public/img/2.png" alt="Instagram" class="Instagram"></a>
                            <a href="https://www.youtube.com/channel/UCAKPauxXArnTWn9WuYldY-Q" target="_blank" title="Youtube"><img src="public/img/5.png" alt="Youtube" class="youtube"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'include/footertest.php'; ?>

        
        <!--<script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>

      const button = new Crate({
        server: '502528973012467723',
        channel: '677965621501362194',
        shard: 'https://e.widgetbot.io'
      })

      button.notify('French Gaming Family ')


    setInterval(() => {
        button.options.color = "#000000".replace(/0/g, () => {
              return (~~(Math.random() * 16)).toString(16)
            })
      }, 750)

    </script>-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.dev.js"></script>
        <script>
            var socket = io.connect('http://213.136.80.189:8080');
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="public/js/script.js"></script>
        <script src="public/js/contact.js"></script>
    </body>
</html>
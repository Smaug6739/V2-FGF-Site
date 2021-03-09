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
        <title>Services</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../public/css/services.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <meta content="https://french-gaming-family.fr/public/img-fond/banner-img.png" property="og:image">
        <script data-ad-client="ca-pub-6560315132389166" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <link href="http://fr.allfont.net/allfont.css?fonts=pacifico" rel="stylesheet" type="text/css" />

    </head>
    
    <body>
        <?php include "./nav.php"; ?>

       
            
       

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
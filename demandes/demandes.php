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
        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <meta name="msvalidate.01" content="7C7EC0EDC71E20EB808536B3745497F9" />
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />

    </head>
    
    <body>
        <?php include "../include/nav.php"; ?>
        <?php include "../include/header.php"; ?>

<div id="contact" class="d-flex flex-column align-items-center col-lg-12 mt-5 pt-5">

                    <form action="../models/contact.php" method="post" class="mt-5 col-lg-8" autocomplete="off">
                   
                        <fieldset class="form-group">
                            <legend>Vos coordonnées</legend>
                            <div class="form-group">
                                <label for="in_name">Votre pseudo discord</label>
                                <input type="text" class="form-control" id="in_name" name="in_name" placeholder="User#0000">
                            </div>
                            <div class="form-group">
                                <label for="in_mail">Votre adresse mail</label>
                                <input type="email" class="form-control" id="in_mail" name="in_mail" placeholder="Votre mail">
                            </div>
                        </fieldset>


                        <fieldset class="form-group">
                            <legend>Votre demande</legend>
                            <div class="form-group d-flex flex-column">
                                <label for="ta_message">Faites votre demande, elle sera traitée au plus vite :<br>
                                <img src="../public/img/flecherouge.gif" style="max-width:10%;"> Pour toute demande de partenariat cliquez : <a href="http://french-gaming-family.yj.fr/partenaire/partenaire.php">ici</a> </label>
                                <textarea name="ta_message" id="ta_message" cols="40" rows="4"> </textarea>
                            </div>  
                            <div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>

                            <input type="hidden" name="a" value="demande">
                            <div style="text-align:center;"><button id="btn_submit" type="submit" class="btn btn-primary">Envoyer</button></div>

                        </fieldset>
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- contactBaniere -->
                        <ins class="adsbygoogle"
                            style="display:inline-block;width:728px;height:90px"
                            data-ad-client="ca-pub-6560315132389166"
                            data-ad-slot="4283959519"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </form>

                </div>

                <!-- FOOTER -->

            </div>
        </div>
            
        <?php include '../include/footertest.php'; ?>

        
        <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>

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

    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.dev.js"></script>
        <script>
            var socket = io.connect('http://213.136.80.189:8080');
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../public/js/script.js"></script>
        <script src="../public/js/contact.js"></script>
    </body>
</html>
<?php

session_start();

?>



<!doctype html>

<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FGF- Infos</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />

        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />

        <script data-ad-client="ca-pub-6560315132389166" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />

    </head>

    

    <body>
    <?php include "../include/nav.php"; ?>

        <?php include "../include/header.php"; ?>

        


        

        <div id="partenariat" class="container-fluid">

            <div id="contact" class="d-flex flex-column align-items-center col-lg-12">



                <form class="mt-5 col-lg-8" autocomplete="off" method="post" action="../models/partenaire.php">



                    <fieldset class="form-group" >

                        <legend>Qu'est ce que le rôle de partenaire ?</legend>

                        <p>

                            Ce rôle est donné aux personnes ayant postuler pour mettre en avant un projet, un serveur discord, un site internet etc... 

                            Il a pour avantage d'être plus visible que les autres et d'octroyer des permissions supplémentaires 

                            (comme celles d'écrire dans un salon dédié aux partenaires et de voir son message épinglé). 

                            Les partenaires ont l'autorisation d'utiliser la mention @everyone (sans spam). 

                            Si vous êtes propriétaire d'un serveur discord répondant aux critères ci-dessous vous êtes invité à postuler pour éventuellement devenir partenaire.

                        </p>

                    </fieldset>



                    <fieldset class="form-group" >

                        <legend >Conditions pour devenir partenaire :</legend>

                        <ul>

                            <li><img src="../public/img/check.gif" class="GIF"> Nous ne traitons qu'avec des personnes majeures</li>

                            <li><img src="../public/img/check.gif" class="GIF"> Votre projet/serveur/site...etc doit être accessible par tous.</li>

                            <li><img src="../public/img/check.gif" class="GIF"> Votre projet/serveur/site...etc doit être visité par un administrateur qui validera ensuite la demande.</li>

                        </ul>

                    </fieldset>



                    <fieldset class="form-group">

                        <legend>Vos coordonnées</legend>

                        <div class="form-group">

                            <label for="in_pseudo">Votre pseudo discord</label>

                            <input type="text" class="form-control" id="in_pseudo" name="pseudo" placeholder="User#0000">

                        </div>

                        <div class="form-group">

                            <label for="in_mail">Votre adresse mail</label>

                            <input type="email" class="form-control" id="in_mail" name="email" placeholder="Votre mail">

                        </div>

                    </fieldset>



                    <fieldset class="form-group">
                    <div>
                        <legend>Informations</legend>

                        <label for="age">Avez vous plus de 18 ans ?</label>

                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="age" id="yes" value="1" checked>

                            <label class="form-check-label" for="yes">Oui</label>

                          </div>

                          <div class="form-check">

                            <input class="form-check-input" type="radio" name="age" id="no" value="0">

                            <label class="form-check-label" for="no">Non</label>

                          </div>

                        <div class="form-group">

                            <label for="q1">Pour quelles raisons voulez-vous devenir partenaire du serveur discord French Gaming Family ?</label>

                            <input type="text" class="form-control question" id="q1" name="q1" placeholder="Quels sont vos motivations ?">

                        </div> 

                        <div class="form-group">

                            <label for="q2">Avez-vous déjà été partenaire d'un projet communautaire ? Si oui, le(s)quel(s) ?</label>

                            <input type="text" class="form-control question" id="q2" name="q2" placeholder="Serveur(s) discord , associations, groupes etc...">

                        </div>  

                        <div class="form-group">

                            <label for="q3">Quel projet vous a pousser à faire cette requête ?</label>

                            <input type="text" class="form-control question" id="q3" name="q3" placeholder="">

                        </div>

                        <div class="form-group">

                            <label for="q4">Pourquoi nous avoir choisis ?</label>

                            <input type="text" class="form-control question" id="q4" name="q4" placeholder="">

                        </div>

                        <div class="form-group">

                            <label for="q5">Pouvez-vous nous donner des informations en plus sur votre projet ?</label>

                            <input type="text" class="form-control question" id="q5" name="q5" placeholder="lien du serveur discord etc.">

                        </div>



                        <div class="form-group d-flex flex-column">

                            <label for="q6">Avez-vous une demande, question, remarque à laisser à notre intention ?</label>

                            <textarea class=" question" id="q6" name="q6" id="question" cols="40" rows="4"> </textarea>

                        </div>
                        <div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>

                    </div>
                    </fieldset>
                    <button id="btn_submit" type="submit" name="submit" class="btn btn-primary">Envoyer</button>
                   





                </form> 

            </div>

        </div>

        

        <?php include '../include/footer_thanks.php'; ?>

        <div style="text-align:center;">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- partenaire/staffCaré -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:850px;height:350px"
                        data-ad-client="ca-pub-6560315132389166"
                        data-ad-slot="4691153620"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <script src="../public/js/functions.js"></script>

        <script src="../public/js/script.js"></script>

        <script src="../public/js/partenaire.js"></script>

    </body>

</html>
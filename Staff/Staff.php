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
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script data-ad-client="ca-pub-6560315132389166" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />

    </head>
    
    <body>
    <div>
    <?php include "../include/nav.php"; ?>

    <?php /*include "../include/header.php"; */?>
        </div>
    <main id="fond">
        <div id="infos" class="container-fluid col-lg-12 p-0 pt-5 mt-5">

            

            

            <div id="contact" class="row d-flex flex-column align-items-center col-lg-12 m-0 p-0">
                <ul>
                     <li><h3 style="text-decoration:underline">Avant de remplire le formulaire veuillez lire ce ducument PDF :<a href="../public/Staff.pdf"> Staff PDF</a></h3></li>
                </ul>
                <form id="staff_form" class="col-lg-8" autocomplete="off" method="post" action="../models/staff.php">
                    <legend >Formulaire devenir staff d'un jeu :</legend>

                    <fieldset class="form-group m-0">
                        <legend>Vos coordonnées</legend>
                        <div class="form-group">
                            <label for="in_pseudo">Votre pseudo discord</label>
                            <input type="text" class="form-control" id="in_pseudo" name="in_pseudo" placeholder="User#0000">
                        </div>
                        <div class="form-group">
                            <label for="in_mail">Votre adresse mail</label>
                            <input type="email" class="form-control" id="in_mail" name="in_mail" placeholder="Votre mail">
                        </div>
                    </fieldset>

                    <fieldset class="form-group m-0">
                        <legend>Informations</legend>
                        <div>
                        <label for="age">Avez vous plus de 18 ans ?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="age" id="yes" value="1" checked>
                                <label class="form-check-label" for="yes">Oui</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="age" id="no" value="0">
                                <label class="form-check-label" for="no">Non</label>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="se_games">De quel jeu voulez vous devenir staff ?</label>
                            <select id="se_games" name="se_games[]" multiple="multiple">
                                <option value="Apex Legends">Apex Legends</option>
                                <option value="The Elder Scrolls Online">The Elder Scrolls Online</option>
                                <option value="Rainbow Six Siege">Rainbow Six Siege</option>
                                <option value="Warframe">Warframe</option>
                                <option value=" Saint Seiya: Awakening "> Saint Seiya: Awakening </option>
                                <option value="GTA V">GTA V</option>
                                <option value="Call Of Duty (ALL) ">Call Of Duty (ALL) </option>
                                <option value="Yu-Gi-Oh (YGOPRO: The dawn of a new era) ">Yu-Gi-Oh (YGOPRO: The dawn of a new era) </option>
                                <option value="Fortnite">Fortnite</option>
                                <option value="Guns Of Glory">Guns Of Glory</option>
                                <option value="League Of Legends">League Of Legends</option>
                                <option value=" Rocket League"> Rocket League</option>
                                <option value="Battlefield (ALL) ">Battlefield (ALL) </option>
                                <option value="Dying Light">Dying Light</option>
                                <option value="Pokeverse">Pokeverse</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="q1">Pour quels raisons voulez vous devenir modérateur du serveur discord French Gaming Family ?</label>
                            <input type="text" class="form-control question" id="q1" name="q1" placeholder="Quels sont vos motivations ?">
                        </div> 
                        <div class="form-group">
                            <label for="q2">Avez-vous déjà été modérateur d'un projet communautaire ? Si oui, le(s)quel(s) ?</label>
                            <input type="text" class="form-control question" id="q2" name="q2" placeholder="Serveur(s) discord , associations, groupes etc...">
                        </div>  
                        <div class="form-group">
                            <label for="q3">Votre principale qualité ?</label>
                            <input type="text" class="form-control question" id="q3" name="q3" placeholder="Soyez sincère. Votre réponse n'aura aucune conséquence sur votre recrutement.">
                        </div>
                        <div class="form-group">
                            <label for="q4">Votre principale défaut ? </label>
                            <input type="text" class="form-control question" id="q4" name="q4" placeholder="Soyez sincère. Votre réponse n'aura aucune conséquence sur votre recrutement.">
                        </div> 
                        <div class="form-group">
                            <label for="q5"> Etes vous pret à donner un peu de votre temps chaque jour pour gérer vos salons, et chaque semaine pour recruter de nouveaux joueurs sur les reseaux ? </label>
                            <input type="text" class="form-control question" id="q5" name="q5" placeholder="Soyez sincère. Nous avons absolument besoin d'un staff actif">
                        </div> 
                        <div class="form-group d-flex flex-column">
                            <label for="q6">Avez vous une demande, question, remarque à laisser a l'intention des admins ?</label>
                            <textarea class="question" name="q6" id="q6" cols="40" rows="4"> </textarea>
                        </div>
                        <a><div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div></a><br>

                        <div style="text-align:center;"><button id="btn_submit" type="submit" name="submit" class="btn btn-primary">Envoyer</button></div>

                    </fieldset>
                    

                    

                </form>      
            </div>    
        </main>
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

                <?php include '../include/footertest.php'; ?>
        </div>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src="../public/js/functions.js"></script>
        <script src="../public/js/script.js"></script>
        <script src="../public/js/infos.js"></script>

    </body>
</html>
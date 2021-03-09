<?php
session_start();
include '../models/config.php';
include '../classes/User.php';

if(get('action') == 'login') {

  $params = array(
    'client_id' => OAUTH2_CLIENT_ID,
    'redirect_uri' => 'https://french-gaming-family.yj.fr/login.php',
    'response_type' => 'code',
    'scope' => 'identify email guilds'
  );

  // Redirect the user to Discord's authorization page
  header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
  die();
}

if(get('code')) {

  // Exchange the auth code for a token
  $token = apiRequest($tokenURL, array(
    "grant_type" => "authorization_code",
    'client_id' => OAUTH2_CLIENT_ID,
    'client_secret' => OAUTH2_CLIENT_SECRET,
    'redirect_uri' => 'https://french-gaming-family.yj.fr/login.php',
    'code' => get('code')
  ));
  $logout_token = $token->access_token;
  $_SESSION['access_token'] = $token->access_token;


  header('Location: ' . $_SERVER['PHP_SELF']);
}

if(session('access_token')) {
  $user = apiRequest($apiURLBase);
  
  //print_r($user);
  
  $User = new User();
  $User->setLogin($user->username);
  $User->setDiscord_id($user->id);
  $User->setMail($user->email);
  
  if($User->verifyDiscord()) {
        if($User->discordSubscribe()) {
            $_SESSION["user_name"] = $user->username;
            $_SESSION["user_logged"] = true;
            $_SESSION["user"] = $user->id;
            $_SESSION["avatar"] = "https://cdn.discordapp.com/avatars/".$user->id."/".$user->avatar.".png?size=64";
        }
  } else {
        unset($User);
        header('Location: https://french-gaming-family.fr/subscribe.php?e=2');
  }
  
  
 
  header('Location: https://french-gaming-family.fr/subscribe.php?e=1');

}

if(isset($_SESSION["admin"])) {
    header("Location: http://french-gaming-family.fr/admin/");
}
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
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />

    </head>
    
    <body>
                <?php include "../include/nav.php"; ?>
                <?php include "../include/header.php"; ?>
        

        <main role="main">

            <section class="container-fluid pl-0 pr-0">

                <section class="col-xl-12 text-center">

                    <form class="mt-5 mx-auto col-xl-6" autocomplete="off">
                        <fieldset class="form-group">
                            <legend>Vos coordonnées</legend>
                            <div class="form-group">
                                <label for="in_login">Votre pseudo discord ou nom d'utilisateur</label>
                                <input type="text" class="form-control" id="in_login" name="in_login" placeholder="Identifiant">
                                <span id="help-login"></span>
                            </div>
                            <div class="form-group">
                                <label for="in_mail">Votre adresse mail</label>
                                <input type="email" class="form-control" id="in_mail" name="email" placeholder="Votre mail">
                                <span id="help-mail"></span>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Vos identifiants</legend>

                            <div class="form-group d-flex flex-column">

                                <label for="in_pass">Votre mot de passe</label>
                                <input autocomplete="new-password" type="password" class="form-control" id="in_pass" name="in_pass" placeholder="Mot de passe">
                                <span id="help-pass"></span>

                                <label for="in_confirm">Confirmez votre mot de passe</label>
                                <input autocomplete="off" type="password" class="form-control" id="in_confirm" name="in_confirm" placeholder="Confirmer mot de passe">
                                <span id="help-confirm"></span>
                            </div>  

                        </fieldset>

                        <div class="g-recaptcha" data-sitekey="<PUBLIC_RECAPTCHA_KEY>"></div>

                        <button id="btn_submit" type="button" class="btn btn-primary">Envoyer</button>
                        

                    </form>
                    <h5><br>Vous avez déjà un compte ?<a href='https://french-gaming-family.fr/login.php'> connectez-vous </a>.</h5>
                    <div style="text-align:center;">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- inscription/loginBaniere -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:728px;height:90px"
                        data-ad-client="ca-pub-6560315132389166"
                        data-ad-slot="3135417429"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    </div>

                </section><!-- /.container -->
            </section>

        </main>
        
        <!-- FOOTER -->
       <br> <?php include '../include/footertest.php'; ?>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../public/js/inscription.js"></script>
    </body>
</html>
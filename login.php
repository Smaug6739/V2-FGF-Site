<?php
session_start();
//var_dump($_SESSION);
include 'models/config.php';
include 'classes/User.php';

if(get('action') == 'login') {

  $params = array(
    'client_id' => OAUTH2_CLIENT_ID,
    'redirect_uri' => 'https://french-gaming-family.fr/login.php',
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
    'redirect_uri' => 'https://french-gaming-family.fr/login.php',
    'code' => get('code')
  ));
  $logout_token = $token->access_token;
  $_SESSION['access_token'] = $token->access_token;


  header('Location: ' . $_SERVER['PHP_SELF']);
}

if(session('access_token')) {
    $user = apiRequest($apiURLBase);

    $User = new User();
    $User->setLogin($user->username);
    $User->setDiscord_id($user->id);
    $User->setMail($user->email);

    if($User->verifyDiscord()) {
        error_log("verify OK", 0);
        if($User->discordSubscribe()) {

            $_SESSION["user_name"] = $user->username;
            $_SESSION["user_logged"] = true;
            $_SESSION["user"] = $user->id;
            $_SESSION["avatar"] = "https://cdn.discordapp.com/avatars/".$user->id."/".$user->avatar.".png?size=64";
            
        }
    } else {
        
        $_SESSION["user_name"] = $user->username;
        $_SESSION["user_logged"] = true;
        $_SESSION["user"] = $user->id;
       $_SESSION["avatar"] = "https://cdn.discordapp.com/avatars/".$user->id."/".$user->avatar.".png?size=64";
        header('Location: https://french-gaming-family.fr/');
    }

    header('Location: https://french-gaming-family.fr/');

}

if(isset($_SESSION["admin"])) {
    header("Location: https://french-gaming-family.fr/admin/");
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
        <link rel="stylesheet" href="public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="public/css/mediaQueries.css" type="text/css" media="screen" />
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />

    </head>
    
    <body>
                <?php include "include/nav.php"; ?>
                <?php include "include/header.php"; ?>
        

        <main role="main">

            <section class="container-fluid pl-0 pr-0">

                <section class="col-xl-12 text-center">

                    <form action="models/login.php" method="post" class="text-center pt-4 col-sm-4 mx-auto mt-5 d-flex flex-column justify-content-around align-items-center">

                        <label for="in_login" class="sr-only">Login</label>
                        <input type="text" id="in_login" class="form-control mb-3" placeholder="login" required="" autofocus="" name="login">
                        <label for="in_pass" class="sr-only">Pass</label>
                        <input type="password" id="in_pass" class="form-control mb-3" placeholder="Password" required="" name="pass">
                        <button class="btn btn-lg btn-success btn-block" type="submit" name="submit">Login</button>
                        <a href="?action=login" class="btn btn-primary discord mt-3"><img src="public/img/Discord.png" width="32">Login with Discord</a>
                    </form>
                    <h6><br>Vous n'avez pas encore de compte ?<a href='https://french-gaming-family.fr/inscription/inscription.php'> Inscrivez-vous gratuitement</a> en 30s.</h6>
                    <h2><br>
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
                    </div><br></h2>


                </section><!-- /.container -->
            </section>
                      <?php include 'include/footertest.php'?>
            
        </main>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="public/js/script.js"></script>
        <script src="public/js/contact.js"></script>
    </body>
</html>
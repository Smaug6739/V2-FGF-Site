<?php
session_start();
include '../models/config.php';
include '../classes/User.php';
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
        <link rel="stylesheet" href="../public/css/main.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../public/css/mediaQueries.css" type="text/css" media="screen" />
        <meta name="google-site-verification" content="DD1z6A8wvXxJ7T6FTogi28NYD76suAaQeK15MDx-UqE" />
    </head>
    <body>
    <?php include "../include/nav.php"; ?>
    <?php include "../include/header.php"; ?>
        <form style="float:left"class="mt-5 col-xl-6" autocomplete="off">
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
            <button id="btn_submit" type="button" class="btn btn-primary">Sauvegarder</button>
            </form>
            <form  style="float:right"class="mt-5 col-xl-6" autocomplete="off">
            <fieldset  class="form-group">
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
            <button id="btn_submit" type="button" class="btn btn-primary">Sauvegarder</button>
        </form>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="../public/js/inscription.js"></script>
    </body>
</html>
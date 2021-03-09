<?php

include "../classes/User.php";

if(isset($_POST["a"]) && !empty($_POST["a"])) {
    $action = htmlspecialchars($_POST["a"]);

    switch($action) {
        case "subscribe":
            subscribe();
            break;
        case "loginExists":
            loginExists();
            break;
        case "mailExists":
            mailExists();
            break;
    }
}

function subscribe() {
    
    $mail = htmlspecialchars($_POST['mail']);
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['pass']);
    
    $User = new User();
    $User->setLogin($login);
    $User->setPass(password_hash($pass, PASSWORD_DEFAULT));
    $User->setMail($mail);
    
    if($User->userSubscribe()) {
        echo '{"error":false}';
    } else {
        echo '{"error":true,"errorStr":"Inscription impossible, contactez l\'administration"}';
    }
    
}

function loginExists() {
    $login = htmlspecialchars($_POST['login']);
    
    if(User::loginExists($login)) {
        echo '{"error":true,"message":"Pseudo déjà pris."}';
    } else {
        echo '{"error":false,"message":"Pseudo disponible."}';
    }
}

function mailExists() {
    $mail = htmlspecialchars($_POST['mail']);
    
    if(User::mailExists($mail)) {
        echo '{"error":true,"message":"Email déjà utilisée."}';
    } else {
        echo '{"error":false,"message":""}';
    }
}
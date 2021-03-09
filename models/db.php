<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=frenngyp_fgf_base_donnee', 'user', 'password');

}

catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
} 
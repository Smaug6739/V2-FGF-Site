<?php

session_start();



include '../classes/Annonces.php';



if(isset($_POST["a"]) && !empty($_POST["a"])) {

    $action = htmlspecialchars($_POST["a"]);

    

    switch ($action) {

        case "postAnnonce":

            postAnnonce();

            break;

        case "getAnnonces":

            getAnnonces();

            break;

        case "delAnnonce":

            delAnnonce();

            break;

    }

}



function postAnnonce() {

    

    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);

    $link = filter_input(INPUT_POST, "link", FILTER_SANITIZE_URL);

    $linkTitle = filter_input(INPUT_POST, "linkTitle", FILTER_SANITIZE_SPECIAL_CHARS);

    $annonce = filter_input(INPUT_POST, "annonce", FILTER_SANITIZE_SPECIAL_CHARS);
    //$annonce = $_POST["ta_annonce"];

    

    $Annonce = new Annonces();

    $Annonce->setAdmin_id($_SESSION["admin"]);

    $Annonce->setTitle($title);

    $Annonce->setLink($link);

    $Annonce->setLink_title($linkTitle);

    $Annonce->setAnnonce(nl2br($annonce));

    

    if($Annonce->insert()) {

        echo '{"error":false}';

    } else {

        echo '{"error":true,"errorStr":"Echec de l\'insertion de l\'annonce"}';

    }

}



function getAnnonces() {

    

    $aff = '';

    

    if($list = Annonces::getAnnonces()) {

        foreach ($list as $value) {

            $Annonce = new Annonces($value->id);

            

            $aff .= '<div class="card col-xl-3 p-0 text-center">';

            //$aff .= '    <img src="..." class="card-img-top" alt="...">';

            $aff .= '    <div class="card-body">';

            $aff .= '       <h5 class="card-title">'.$Annonce->getTitle().'</h5>';

            $aff .= '       <h6 class="card-subtitle mb-2 text-muted">'.$Annonce->getAdminLogin().'</h6>';

            $aff .= '       <p class="card-text">'.$Annonce->getAnnonce().'</p>';

            $aff .= '    </div>';

            $aff .= '    <ul class="list-group list-group-flush">';



            if(!empty($Annonce->getLink())) {

                $aff .= '       <li class="list-group-item"><a href="'.$Annonce->getLink().'" class="btn btn-primary">'.$Annonce->getLink_title().'</a></li>';

            }



            $aff .= '       <li class="list-group-item">Annonce postée le '.$Annonce->getDate().'</li>';

            $aff .= '       <li class="list-group-item"><button class="btn btn-danger del-btn" data-id="'.$Annonce->getId().'">Supprimer</button></li>';

            $aff .= '    </ul>';

            $aff .= '</div>';

        }

    } else {

        $aff .= '<div class="card col-xl-12 p-0">';

        //$aff .= '    <img src="..." class="card-img-top" alt="...">';

        $aff .= '    <div class="card-body">';

        $aff .= '       <h5 class="card-title">Aucune annonces</h5>';

        $aff .= '    </div>';

        $aff .= '</div>';

    }

    

    echo $aff;

}



function delAnnonce() {

    

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    

    $Annonce = new Annonces($id);

    

    if($Annonce->delete()) {

        echo '{"error":false}';

    } else {

        echo '{"error":true,"errorStr":"Echec de la suppression de l\'annonce"}';

    }

}


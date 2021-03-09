<?php
session_start();

include "../classes/Demande.php";
include "../classes/User.php";
include "../classes/Articles.php";
include "../classes/Partenaire.php";
include "../classes/Staff.php";

if(isset($_POST["a"]) && !empty($_POST["a"])) {
    
    $action = htmlspecialchars($_POST["a"]);
    
    switch ($action) {
        case "achieve":
            achieve();
            break;
        case "achievePost":
            achievePost();
            break;
        case "achievePartner":
            achievePartner();
            break;
        case "achieveStaff":
            achieveStaff();
            break;
        case "delete":
            delete();
            break;
        case "deletePost":
            deletePost();
            break;
        case "deletePartner":
            deletePartner();
            break;
        case "deleteUser":
            deleteUser();
            break;
        case "deleteStaff":
            deleteStaff();
            break;
        case "refutePartner":
            refutePartner();
            break;
        case "getPending":
            getPending();
            break;
        case "getPendingPosts":
            getPendingPosts();
            break;
        case "getAchievedPosts":
            getAchievedPosts();
            break;
        case "getPendingPartner":
            getPendingPartner();
            break;
        case "getPendingStaff":
            getPendingStaff();
            break;
        case "getAchievedPartner":
            getAchievedPartner();
            break;
        case "getAchievedStaff":
            getAchievedStaff();
            break;
        case "getAchieved":
            getAchieved();
            break;
        case "updateAccount":
            updateAccount();
            break;
        case "createAccount":
            createAccount();
            break;
        case "fillCards":
            fillCards();
            break;
        case "getUsers":
            getUsers();
            break;
        case "getAdmins":
            getAdmins();
            break;
    }
}

function achieve() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        $Demande = new Demande($id);
        if($Demande->achieve()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de traiter la demande."}';
        }
    }
}

function achievePost() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        $Article = new Articles($id);
        if($Article->achieve()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de traiter l\article."}';
        }
    }
}

function achievePartner() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        $Partner = new Partenaire($id);
        if($Partner->achieve()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de traiter la demande."}';
        }
    }
}

function achieveStaff() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        $Staff = new Staff($id);
        if($Staff->achieve()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de traiter la demande."}';
        }
    }
}

function delete() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        $Demande = new Demande($id);
        if($Demande->delete()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de supprimer la demande."}';
        }
    }
}

function deletePost() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        $Article = new Articles($id);
        if($Article->delete()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de supprimer l\article."}';
        }
    }
}

function deletePartner() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        //error_log("ID = $id", 0);
        $Partner = new Partenaire($id);
        if($Partner->delete()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de supprimer la demande."}';
        }
    }
}

function deleteStaff() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        //error_log("ID = $id", 0);
        $Staff = new Staff($id);
        if($Staff->delete()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de supprimer la demande."}';
        }
    }
}

function deleteUser() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        
        if(User::deleteUser($id)) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de supprimer l\'utilisateur."}';
        }
    }
}

function refutePartner() {
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
        //error_log("ID = $id", 0);
        $Partner = new Partenaire($id);
        if($Partner->refute()) {
            echo '{"error":false}';
        } else {
            echo '{"error":true,"errorStr":"Impossible de traiter la demande."}';
        }
    }
}

function getPending() {
    
    if($list = Demande::getPending()) {
        
        $aff = '{"data":[';
        $cpt = 0;
        
        foreach ($list as $value) {

            $Demande = new Demande($value->id);
            
            $aff .= '{';
            $aff .= '"pseudo":"'.$Demande->getPseudo().'",';
            $aff .= '"mail":"'.$Demande->getMail().'",';
            $aff .= '"message":"'.$Demande->getDemande().'",';
            $aff .= '"date":"'.$Demande->getDate().'",';
            $aff .= '"id":"'.$Demande->getId().'"';
            $aff .= '}';

            if($cpt != count($list) -1) {
                $aff .= ',';
            }

            $cpt++;
        }
        
        $aff .= ']}';

        echo $aff;
        
    } else {
        echo '{"data":[]}';
    }
}

function getPendingPosts() {
    
    if($list = Articles::getPending()) {
        
        $aff = '{"data":[';
        $cpt = 0;
        
        foreach ($list as $value) {

            $Article = new Articles($value->id);
            $login = User::getLoginById($Article->getUserId());
            
            $aff .= '{';
            $aff .= '"user":"'.$login.'",';
            $aff .= '"category":"'.$Article->getCatStr().'",';
            $aff .= '"title":"'.$Article->getTitle().'",';
            $aff .= '"content":"'.$Article->getContent().'",';
            $aff .= '"date":"'.$Article->getDate().'",';
            $aff .= '"id":"'.$Article->getId().'"';
            $aff .= '}';

            if($cpt != count($list) -1) {
                $aff .= ',';
            }

            $cpt++;
        }
        
        $aff .= ']}';

        echo $aff;
        
    } else {
        echo '{"data":[]}';
    }
}

function getPendingPartner() {
    
    $aff = '';
    
    if($list = Partenaire::getPending()) {
        
        foreach ($list as $value) {

            $Partner = new Partenaire($value->id);

            $aff .= '<div class="card col-xl-12 p-0 mt-3">';
            //$aff .= '    <img src="..." class="card-img-top" alt="...">';
            $aff .= '    <div class="card-body">';
            $aff .= '       <h5 class="card-title">'.$Partner->getPseudo().'</h5>';
            $aff .= '       <h6 class="card-subtitle mb-2 text-muted">'.$Partner->getMail().'</h6>';
            $aff .= '    </div>';
            $aff .= '    <ul class="list-group list-group-flush">';
            $aff .= '       <li class="list-group-item"><b>Avez-vous 18 ans ?</b><br>'.$Partner->getMajeurStr().'</li>';
            $aff .= '       <li class="list-group-item"><b>Pour quelles raisons voulez-vous devenir partenaire du serveur discord French Gaming Family ?</b><br>'.$Partner->getQ1().'</li>';
            $aff .= '       <li class="list-group-item"><b>Avez-vous déjà été partenaire d\'un projet communautaire ? Si oui, le(s)quel(s) ?</b><br>'.$Partner->getQ2().'</li>';
            $aff .= '       <li class="list-group-item"><b>Quel projet vous a pousser à faire cette requête ?</b><br>'.$Partner->getQ3().'</li>';
            $aff .= '       <li class="list-group-item"><b>Pourquoi nous avoir choisis ?</b><br>'.$Partner->getQ4().'</li>';
            $aff .= '       <li class="list-group-item"><b>Pouvez-vous nous donner des informations en plus sur votre projet ?</b><br>'.$Partner->getQ5().'</li>';
            $aff .= '       <li class="list-group-item"><b>Avez-vous une demande, question, remarque à laisser à notre intention ?</b><br>'.$Partner->getQ6().'</li>';
            $aff .= '       <li class="list-group-item">Demande postée le '.$Partner->getDate().'</li>';
            $aff .= '       <li class="list-group-item"><button class="btn btn-success treatment-btn" data-id="'.$value->id.'">Accepter</button><button class="btn btn-danger refute-btn" data-pseudo="'.$Partner->getPseudo().'" data-id="'.$value->id.'">Refuser</button></li>';
            $aff .= '    </ul>';
            $aff .= '</div>';
        }
        
    } else {
        $aff .= '<div class="card col-xl-12 p-0">';
        //$aff .= '    <img src="..." class="card-img-top" alt="...">';
        $aff .= '    <div class="card-body">';
        $aff .= '       <h5 class="card-title">Aucune demandes en attente</h5>';
        $aff .= '    </div>';
        $aff .= '</div>';
    }
    
    echo $aff;
}

function getPendingStaff() {
    
    $aff = '';
    
    if($list = Staff::getPending()) {
        
        foreach ($list as $value) {

            $Staff = new Staff($value->id);

            $aff .= '<div class="card col-xl-12 p-0 mt-3">';
            //$aff .= '    <img src="..." class="card-img-top" alt="...">';
            $aff .= '    <div class="card-body">';
            $aff .= '       <h5 class="card-title">'.$Staff->getPseudo().'</h5>';
            $aff .= '       <h6 class="card-subtitle mb-2 text-muted">'.$Staff->getMail().'</h6>';
            $aff .= '    </div>';
            $aff .= '    <ul class="list-group list-group-flush">';
            $aff .= '       <li class="list-group-item"><b>Avez vous plus de 18 ans ?</b><br>'.$Staff->getMajeurStr().'</li>';
            $aff .= '       <li class="list-group-item"><b>De quel jeu voulez vous devenir staff ?</b><br>'.$Staff->getGames().'</li>';
            $aff .= '       <li class="list-group-item"><b>Pour quels raisons voulez vous devenir modérateur du serveur discord French Gaming Family ?</b><br>'.$Staff->getQ1().'</li>';
            $aff .= '       <li class="list-group-item"><b>Avez-vous déjà été modérateur d\'un projet communautaire ? Si oui, le(s)quel(s) ?</b><br>'.$Staff->getQ2().'</li>';
            $aff .= '       <li class="list-group-item"><b>Votre principale qualité ?</b><br>'.$Staff->getQ3().'</li>';
            $aff .= '       <li class="list-group-item"><b>Votre principale défaut ?</b><br>'.$Staff->getQ4().'</li>';
            $aff .= '       <li class="list-group-item"><b>Etes vous pret à donner un peu de votre temps chaque jour pour gérer vos salons, et chaque semaine pour recruter de nouveaux joueurs sur les reseaux ?</b><br>'.$Staff->getQ5().'</li>';
            $aff .= '       <li class="list-group-item"><b>Avez vous une demande, question, remarque à laisser a l\'intention des admins ?</b><br>'.$Staff->getQ6().'</li>';
            $aff .= '       <li class="list-group-item">Demande postée le '.$Staff->getDate().'</li>';
            $aff .= '       <li class="list-group-item"><button class="btn btn-success treatment-btn" data-id="'.$value->id.'">Accepter</button><button class="btn btn-danger del-btn" data-pseudo="'.$Staff->getPseudo().'" data-id="'.$value->id.'">Supprimer</button></li>';
            $aff .= '    </ul>';
            $aff .= '</div>';
        }
        
    } else {
        $aff .= '<div class="card col-xl-12 p-0">';
        //$aff .= '    <img src="..." class="card-img-top" alt="...">';
        $aff .= '    <div class="card-body">';
        $aff .= '       <h5 class="card-title">Aucune demandes en attente</h5>';
        $aff .= '    </div>';
        $aff .= '</div>';
    }
    
    echo $aff;
}

function getAchievedStaff() {
    
    $aff = '';
    
    if($list = Staff::getAchieved()) {
        
        foreach ($list as $value) {

            $Staff = new Staff($value->id);
            $games = explode(",", $Staff->getGames());

            $aff .= '<div class="card col-xl-12 p-0 mt-3">';
            //$aff .= '    <img src="..." class="card-img-top" alt="...">';
            $aff .= '    <div class="card-body">';
            $aff .= '       <h5 class="card-title">'.$Staff->getPseudo().'</h5>';
            $aff .= '       <h6 class="card-subtitle mb-2 text-muted">'.$Staff->getMail().'</h6>';
            $aff .= '    </div>';
            $aff .= '    <ul class="list-group list-group-flush">';
            
            foreach ($games as $val) {
                $aff .= '       <li class="list-group-item"><b>'.$val.'</b></li>';
            }
            
            $aff .= '       <li class="list-group-item"><button class="btn btn-danger del-btn" data-pseudo="'.$Staff->getPseudo().'" data-id="'.$value->id.'">Supprimer</button></li>';
            $aff .= '    </ul>';
            $aff .= '</div>';
        }
        
    } else {
        $aff .= '<div class="card col-xl-12 p-0">';
        //$aff .= '    <img src="..." class="card-img-top" alt="...">';
        $aff .= '    <div class="card-body">';
        $aff .= '       <h5 class="card-title">Aucune demandes en attente</h5>';
        $aff .= '    </div>';
        $aff .= '</div>';
    }
    
    echo $aff;
}

function getAchievedPosts() {
    
    if($list = Articles::getAchieved()) {
        
        $aff = '{"data":[';
        $cpt = 0;
        
        foreach ($list as $value) {

            $Article = new Articles($value->id);
            $login = User::getLoginById($Article->getUserId());
            
            $aff .= '{';
            $aff .= '"user":"'.$login.'",';
            $aff .= '"category":"'.$Article->getCatStr().'",';
            $aff .= '"title":"'.$Article->getTitle().'",';
            $aff .= '"content":"'.$Article->getContent().'",';
            $aff .= '"date":"'.$Article->getDate().'",';
            $aff .= '"id":"'.$Article->getId().'"';
            $aff .= '}';
            
            if($cpt != count($list) -1) {
                $aff .= ',';
            }

            $cpt++;
        }
        
        $aff .= ']}';

        echo $aff;
        
    } else {
        echo '{"data":[]}';
    }
}

function getAchievedPartner() {
    
    $aff = '';
    
    if($list = Partenaire::getAchieved()) {

        foreach ($list as $value) {

            $Partner = new Partenaire($value->id);

            $aff .= '<div class="card col-xl-12 p-0 mt-3">';
            //$aff .= '    <img src="..." class="card-img-top" alt="...">';
            $aff .= '    <div class="card-body">';
            $aff .= '       <h5 class="card-title">'.$Partner->getPseudo().'</h5>';
            $aff .= '       <h6 class="card-subtitle mb-2 text-muted">'.$Partner->getMail().'</h6>';
            $aff .= '       <h6 class="card-subtitle mb-2 text-muted">'.$Partner->getStatutBadge().'</h6>';
            $aff .= '    </div>';
            $aff .= '    <ul class="list-group list-group-flush">';
            $aff .= '       <li class="list-group-item"><b>Avez-vous 18 ans ?</b><br>'.$Partner->getMajeurStr().'</li>';
            $aff .= '       <li class="list-group-item"><b>Pour quelles raisons voulez-vous devenir partenaire du serveur discord French Gaming Family ?</b><br>'.$Partner->getQ1().'</li>';
            $aff .= '       <li class="list-group-item"><b>Avez-vous déjà été partenaire d\'un projet communautaire ? Si oui, le(s)quel(s) ?</b><br>'.$Partner->getQ2().'</li>';
            $aff .= '       <li class="list-group-item"><b>Quel projet vous a pousser à faire cette requête ?</b><br>'.$Partner->getQ3().'</li>';
            $aff .= '       <li class="list-group-item"><b>Pourquoi nous avoir choisis ?</b><br>'.$Partner->getQ4().'</li>';
            $aff .= '       <li class="list-group-item"><b>Pouvez-vous nous donner des informations en plus sur votre projet ?</b><br>'.$Partner->getQ5().'</li>';
            $aff .= '       <li class="list-group-item"><b>Avez-vous une demande, question, remarque à laisser à notre intention ?</b><br>'.$Partner->getQ6().'</li>';
            $aff .= '       <li class="list-group-item">Demande postée le '.$Partner->getDate().'</li>';
            $aff .= '       <li class="list-group-item"><button class="btn btn-danger del-btn" data-pseudo="'.$Partner->getPseudo().'" data-id="'.$value->id.'">Supprimer</button></li>';
            $aff .= '    </ul>';
            $aff .= '</div>';
        }

    } else {
        $aff .= '<div class="card col-xl-12 p-0">';
        //$aff .= '    <img src="..." class="card-img-top" alt="...">';
        $aff .= '    <div class="card-body">';
        $aff .= '       <h5 class="card-title">Aucun partenariat</h5>';
        $aff .= '    </div>';
        $aff .= '</div>';
    }
    
    echo $aff;
}

function getAchieved() {
    
    if($list = Demande::getAchieved()) {
        
        $aff = '{"data":[';
        $cpt = 0;
        
        foreach ($list as $value) {

            $Demande = new Demande($value->id);
            
            $aff .= '{';
            $aff .= '"pseudo":"'.$Demande->getPseudo().'",';
            $aff .= '"mail":"'.$Demande->getMail().'",';
            $aff .= '"message":"'.$Demande->getDemande().'",';
            $aff .= '"date":"'.$Demande->getDate().'",';
            $aff .= '"id":"'.$Demande->getId().'"';
            $aff .= '}';

            if($cpt != count($list) -1) {
                $aff .= ',';
            }

            $cpt++;
        }
        
        $aff .= ']}';

        echo $aff;
        
    } else {
        echo '{"data":[]}';
    }
}

function getUsers() {
    
    if($list = User::getUsers()) {
        
        $aff = '{"data":[';
        $cpt = 0;
        
        foreach ($list as $value) {

            $aff .= '{';
            $aff .= '"pseudo":"'.$value->login.'",';
            $aff .= '"mail":"'.$value->mail.'",';
            $aff .= '"discord":"'.$value->discord_id.'",';
            $aff .= '"date":"'.date("d/m/Y", $value->date_insert).'",';
            $aff .= '"id":"'.$value->id.'"';
            $aff .= '}';

            if($cpt != count($list) -1) {
                $aff .= ',';
            }

            $cpt++;
        }
        
        $aff .= ']}';

        echo $aff;
        
    } else {
        echo '{"data":[]}';
    }
}

function getAdmins() {
    
    if($list = User::getAdmins()) {
        
        $aff = '{"data":[';
        $cpt = 0;
        
        foreach ($list as $value) {

            $aff .= '{';
            $aff .= '"pseudo":"'.$value->login.'",';
            $aff .= '"mail":"'.$value->mail.'",';
            $aff .= '"super":"'.$value->super_admin.'",';
            $aff .= '"date":"'.date("d/m/Y", $value->date_insert).'",';
            $aff .= '"id":"'.$value->id.'"';
            $aff .= '}';

            if($cpt != count($list) -1) {
                $aff .= ',';
            }

            $cpt++;
        }
        
        $aff .= ']}';

        echo $aff;
        
    } else {
        echo '{"data":[]}';
    }
}

function createAccount() {
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $pass = htmlspecialchars($_POST["pass"]);
    
    if(User::create($pseudo, password_hash($pass, PASSWORD_DEFAULT))) {
        echo '{"error":false}';
    } else {
        echo '{"error":true,"errorStr":"Impossible de créer un nouvel admin."}';
    }
}

function updateAccount() {
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $pass = htmlspecialchars($_POST["pass"]);
    
    if(User::update($_SESSION["admin"], $pseudo, password_hash($pass, PASSWORD_DEFAULT))) {
        echo '{"error":false}';
    } else {
        echo '{"error":true,"errorStr":"Impossible de modifier l\'admin."}';
    }
}

function fillCards() {
    $nbDemandes = Demande::getNbDemandes();
    $nbArticles = Articles::getNbArticles();
    $nbPartner = Partenaire::getNbPartner();
    $nbStaff = Staff::getNbStaff();
    
    echo '{"nbDemandes":"'.$nbDemandes.'","nbArticles":"'.$nbArticles.'","nbPartner":"'.$nbPartner.'","nbStaff":"'.$nbStaff.'"}';
}

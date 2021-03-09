<?php
if(file_exists("../public/img/logo.png")) {
    $logo = "../public/img/logo.png";
} else {
    $logo = "public/img/logo.png";
}
?>
  <link href="http://fr.allfont.net/allfont.css?fonts=pacifico" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">  
<nav class="navbar navbar-expand-md navbar-dark col-xl-12" style="background-color:#002f46">
   <!-- <a href="https://french-gaming-family.fr/" class="navbar-brand d-flex flex-row align-items-center" href="#"><img class="ban"src="https://french-gaming-family.fr/public/img/img_nav.png"  /><!--<p class="nav-title m-0"><span class="first">F</span>RENCH  <span class="first">G</span>AMING  <span class="first">F</span>AMILY</p>--></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse stroke" id="navbarCollapse">
        <ul class="navbar-nav ml-auto" style="font-size:98%;">
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/redaction/lastPosts.php">ARTICLES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/album/album.php">ALBUM</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/annonces/annonces.php">ANNONCES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/FAQ/FAQ.php">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/services/services.php"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/services/services.php">SERVICES</a>
            </li>
         
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <?php
            
            if(isset($_SESSION['user']) && $_SESSION['user_logged']) {
                
            if($_SESSION["avatar"]){ ?>

            <img class="mr-3" id="avatar_discord" src="<?=$_SESSION["avatar"]?>"/>

            <?php }else{ ?>

                <img class="mr-3" id="avatar_discord" width='64px'src="https://french-gaming-family.fr/public/img/default.png"/>

            <?php } ?>

                <a href="https://french-gaming-family.fr/logout.php" class="btn btn-outline-warning my-2 my-sm-0" type="submit">Déconnexion</a>
                
            <?php
            
            } else {
                
            ?>
                
                <a href="https://french-gaming-family.fr/login.php" id="login-btn" class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit">Connexion</a>
                <a href="https://french-gaming-family.fr/inscription/inscription.php" class="btn btn-outline-warning my-2 my-sm-0" type="submit">Inscription</a>
                
            <?php
                
            }
            
            ?>
            
        </form>
    </div>

</nav>



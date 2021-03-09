<nav class="navbar navbar-expand-lg navbar-dark bg-black col-xl-12"style="background-color:#002f46">
    <a class="navbar-brand d-flex flex-row align-items-center" href="https://french-gaming-family.fr/"><img class="ban_redac"src="https://french-gaming-family.fr/public/img/img_nav.png"  /><!--<p class="nav-title m-0"><span class="first">F</span>RENCH-<span class="first">G</span>AMING-<span class="first">F</span>AMILY</p>--></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbarSupportedContentRedac" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/album/album.php">ALBUM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/services/services.php">SERVICES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/redaction/lastPosts.php">REDACTION</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/annonces/annonces.php">ANNONCES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/FAQ/FAQ.php">FAQ</a>
            </li>
            
            
            
        </ul>
       <img src="../public/img/logo.png" width="55px" style="opacity:0;"/>

        <ul class="navbar-nav navbar2">
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/redaction/lastPosts.php">DERNIERS ARTICLES</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">GAMING</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-white" href="https://french-gaming-family.fr/redaction/jeux.php">JEUX</a>
                    <a class="dropdown-item text-white" href="https://french-gaming-family.fr/redaction/console.php">CONSOLE</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">AUTRES</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-white" href="https://french-gaming-family.fr/redaction/informatique.php">INFORMATIQUE</a>
                    <a class="dropdown-item text-white" href="https://french-gaming-family.fr/redaction/musique.php">MUSIQUE</a>
                    <a class="dropdown-item text-white" href="https://french-gaming-family.fr/redaction/partenaire.php">PARTENAIRES</a>
                    <a class="dropdown-item text-white" href="https://french-gaming-family.fr/redaction/divers.php">DIVERS</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://french-gaming-family.fr/redaction/post.php">ECRIRE UN ARTICLE</a>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="../public/img/logo.png" width="50px" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse stroke" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item home">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ask">
                <a class="nav-link" href="demandes.php">Demandes</a>
            </li>
            <li class="nav-item post">
                <a class="nav-link" href="articles.php">Articles</a>
            </li>
            <li class="nav-item users">
                <a class="nav-link" href="users.php">Utilisateurs</a>
            </li>
            <li class="nav-item part">
                <a class="nav-link" href="partenariat.php">Partenariats</a>
            </li>
            <li class="nav-item staff">
                <a class="nav-link" href="staff.php">Staff</a>
            </li>
            <li class="nav-item annon">
                <a class="nav-link" href="annonces.php">Annonces</a>
            </li>
            <li class="nav-item annon">
                <a class="nav-link" href="sindex.php">Shop</a>
            </li>
            
            <?php
            
            if($_SESSION['admin_super'] == 1) {
                
            ?>
                <li class="nav-item admins">
                    <a class="nav-link" href="admins.php" style="color: red;">Administrateurs</a>
                </li>
                
            <?php
            }
            
            ?>
            
            
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>


<?php

session_start();



if(!isset($_SESSION["admin"])) {

    header("Location: https://french-gaming-family.fr/login.php");

}



?>
<?php
     
    require 'database.php';
 
    $nameError = $name = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $isSuccess = true;
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO categories (name) values(?)");
            $statement->execute(array($name));
            Database::disconnect();
            header("Location: index.php");
        }
    }
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Shop Admin</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Anton|Dancing+Script|Exo|Lobster|Macondo+Swash+Caps|Pacifico|Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="../public/css/admin.css"/>
    </head>
    
    <body>
    <?php include 'nav.php' ?>
         <div class="container admin">
            <div class="row">
            <h1><strong>Catégories :</strong></h1>
            <h2 style='margin-top:40px'><strong>Ajouter une catégorie au shop</strong></h2>
                <br>
                <form class="form" action="updateshop.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
                <h2 style='margin-top:40px'><strong>Supprimer une catégorie du shop</strong></h2>
                <?php 
                $db = Database::connect();
                $statement = $db->query('SELECT id, name FROM categories');
                while($item = $statement->fetch())
                {
                    echo '<h3>'. $item['name'] . '</h3>';
                    echo '<a class="btn btn-danger" href="deletecategorie.php?id='.$item['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';


                }

                ?>
            </div>
        </div>   
    </body>
</html>
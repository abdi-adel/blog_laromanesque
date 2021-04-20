<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog La Romanesque</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    ?>

    <?php include("header.php"); ?>


    <section id="content">
        <div class="container">
            <h4> <a href="rediger_billet.php"> Rédiges ton billet </a></h4>
        <?php
        try
        {
	        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd -> query('select * from billets order by id desc limit 10') or die(print_r($bdd->errorInfo()));
        
        while ($donnees = $reponse -> fetch())
        {
        ?>
            <div class="post-container">
            <div class="post">
                <div class="post-author">
                    <br>
                    <img src="uploads/photo_adel.jpg" alt="image_auteur">
                    <span><?php echo $donnees['auteur'] ?></span>
                </div>
                <p class="post-date"> 
                    <?php echo $donnees['date_creation_billet'] ?>
                </p>
                <h3 class="post-title"> 
                    <?php echo $donnees['titre'] ?> 
                </h3>
                <div class="post-content">
                    <p>
                        <?php echo $donnees['contenu']; ?> <br> 
                    </p>
                    <p>Vous voulez commenter ce billet, à votre clavier: <a href="ajout_commentaire.php?billet=<?php echo $donnees['id']?>">Commentez</a></p>
                    <p> <a href="commentaires.php?billet=<?php echo $donnees['id']?>"> ? commentaires pour ce billet</a></p>
                </div>
            </div>
            </div>
        <?php
        }

        $reponse->closeCursor();

        ?>

        </div>

    </section>

    <?php include("footer.php"); ?>
    
</body>
</html>
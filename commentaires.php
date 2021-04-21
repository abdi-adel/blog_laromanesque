<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
        <title>Commentaires</title>
    </head>
    <body>

        <?php include("header.php"); ?>


        <section id="content">
            <div class="container">
                <?php
                try
                {
                    // $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    $bdd = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_ba0bff646bb9afe;charset=utf8', 'b8de40cd4aec92', '2fcf7585', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }
                $reponse = $bdd -> query ("select * from billets where id=".$_GET['billet']) or die(print_r($bdd->errorInfo()));
                $donnees = $reponse -> fetch();
                
                ?>
                
                    <div class="post-container">
                        <div class="post">
                            <div class="affichage_billet">
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
                                </div> <br> <br>
                            </div>
                        </div>
                    </div>
                <?php 
                
                $reponse->closeCursor();

                $reponse = $bdd -> prepare("select * from commentaires where id_billet=? order by id desc") or die(print_r($bdd->errorInfo()));
                $reponse -> execute(array($_GET['billet']));

                while ($donnees = $reponse -> fetch())
                {
                ?>

                <div class="post-container">  
                    <div class="post">
                        <div class="affichage_billet">
                            <div class="post-author">
                                <br>
                                <img src="uploads/photo_adel.jpg" alt="image_auteur">
                                <span><?php echo $donnees['auteur_commentaire'] ?></span>
                            </div>
                                <p class="post-date"> 
                                    <?php echo $donnees['date_creation_commentaire'] ?>
                                </p>
                            <div class="post-content">
                                <p>
                                    <?php echo $donnees['commentaire']; ?> <br> 
                                </p>
                            </div> <br> <br>
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
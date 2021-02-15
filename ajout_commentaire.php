<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout commentaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("header.php") ?>

<section id="rediger_commentaire">
    <div class="container">
        <div class="redaction_commentaire">
            <h4>Rédiges ton commentaire</h4>
            <form method="POST" action="ajout_commentaire_bdd.php?billet=<?php echo $_GET['billet']?>">
                <label for="auteur_commentaire"> Ton nom </label> <br>
                <input type="text" id="auteur_commentaire" name="auteur_commentaire"> <br> <br>
                <label for="contenu_commentaire"> Ton commentaire </label>
                <textarea id="contenu_commentaire" name="contenu_commentaire" cols="30" rows="10"></textarea> <br>
                <input type="submit" value="Envoyer mon commentaire" id="bouton_envoi_commentaire">
            </form>
        </div>
    </div>
</section>



<?php include("footer.php") ?>
    
</body>
</html>

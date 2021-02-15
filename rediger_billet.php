<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rédiges ton billet</title>
</head>
<body>
    <?php include("header.php") ?>

    <section id="rediger_billet">
        <div class="container">
            <div class="redaction_billet">
                <h4>Rédiges ton billet ici</h4>
                <form method="POST" action="ajout_billet.php">
                    <label for="auteur_billet">Ton nom </label> <br>
                    <input type="text" id="auteur_billet" name="auteur_billet"> <br> <br>
                    <label for="titre_billet">Titre de ton billet </label>
                    <input type="text" id="titre_billet" name="titre_billet"> <br> <br>
                    <label for="contenu_billet">Ton contenu </label>
                    <textarea id="contenu_billet" name="contenu_billet" cols="30" rows="10"></textarea> <br>
                    <input type="submit" value="Envoyer mon billet" id="bouton_envoi_billet">
                    
                </form>
            </div>
        </div>
    </section>

    <?php include("footer.php") ?>
</body>
</html>
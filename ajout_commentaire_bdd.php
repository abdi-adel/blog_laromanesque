<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$req = $bdd -> prepare('INSERT INTO commentaires (id_billet, auteur_commentaire, commentaire) 
VALUES(?, ?, ?)') or die(print_r($bdd->errorInfo()));
$req -> execute (array(
	strip_tags($_GET["billet"]),
    strip_tags($_POST["auteur_commentaire"]),
    nl2br(strip_tags($_POST["contenu_commentaire"]))
	));

echo 'Votre commentaire a bien été envoyé !';

header('Location: commentaires.php');

?>
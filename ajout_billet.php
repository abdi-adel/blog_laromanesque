<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$req = $bdd -> prepare('INSERT INTO billets (auteur, titre, contenu) VALUES(?, ?, ?)') or die(print_r($bdd->errorInfo()));
$req -> execute (array(
    nl2br(strip_tags($_POST["auteur_billet"])),
    nl2br(strip_tags($_POST["titre_billet"])),
    nl2br(strip_tags($_POST["contenu_billet"]))
	));

echo 'Votre billet a bien été envoyé !';

header('Location: index.php');

?>
<?php

//Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;

// Connect to DB

try
{
    // $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
	// $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_ba0bff646bb9afe;charset=utf8', 'b8de40cd4aec92', '2fcf7585', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// $req = $bdd -> prepare('INSERT INTO billets (auteur, titre, contenu) VALUES(?, ?, ?)') or die(print_r($bdd->errorInfo()));
$req = $bdd -> prepare('INSERT INTO billets (auteur, titre, contenu) VALUES(?, ?, ?)') or die(print_r($bdd->errorInfo()));
$req -> execute (array(
    nl2br(strip_tags($_POST["auteur_billet"])),
    nl2br(strip_tags($_POST["titre_billet"])),
    nl2br(strip_tags($_POST["contenu_billet"]))
	));

echo 'Votre billet a bien été envoyé !';

header('Location: index.php');

?>
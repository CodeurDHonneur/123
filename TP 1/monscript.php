<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

try {
    $bdd = new PDO ('mysql:host=localhost;dbname=test', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE
possesseur = :possesseur AND prix <= :prixmax');

$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));
?>

</body>
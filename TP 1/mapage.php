<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>NASA</title>
        <link rel="stylesheet" href="style.css">
    </head>
</html>
<body>
    <?php
    //try {
        $bdd = new PDO ('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   /* }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }*/

    $req = $bdd -> prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ? AND prix <= ? ORDER BY prix');

    
    $req->execute([$_GET['possesseur'], $_GET['prix_max']]);
    //print_r($_GET['possesseur']);

    echo '<ul>';
    while ($donnees = $req->fetch())
    {
        echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR</li>';
    }
    echo '</ul>';

    $req->closeCursor();
    ?>
</body>
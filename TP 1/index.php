<?php 
session_start();

$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;
?>


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

    <p>
        Salut <?php echo $_SESSION['prenom']; ?> !<br/>
        Tu es à l'accueil de mon site (index.php). Tu veux aller sur une autre page ?
    </p>

    <p>
        <a href="mapage.php">Lien vers mapage.php</a><br>
        <a href="monscript.php">Lien vers monscript.php</a><br>
        <a href="informations.php">Lien vers informations.php</a><br>
    </p>

    <?php 
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $response = $bdd->query('SELECT * FROM jeux_video');

    while ($donnees = $response->fetch()) {
      ?>
      <p>
        <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
        Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il vend à <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
        <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?> </em>
      </p>  
      <?php
    }
    
    $response->closeCursor();

    $response2 = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur =\'Patrick\'');

    while($donnees= $response2->fetch())
    {
    echo $donnees['nom'] . 'appartient à ' . $donnees['possesseur']. '<br />';

    }

    $response2->closeCursor();
?>

</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Titre de ma page</title>
</head>

<body>

    <p>Re-bonjour ! </p>
    <p>
        Je me souviens de toi ! Tu t'appelles <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> !<br/>
        Et ton âge hummm... Tu as <?php echo $_SESSION['age']; ?>
        ans, c'est ça ? 
    </p>

    <h3>Procédons à l'affichage du contenu de la table </h3>
    <?php

    try{
        //établissement de lma connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    } 
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $response = $bdd->query('SELECT * FROM news');

    

    while($donnees = $response->fetch()){
    ?>
        <strong>L'article n° <?= $donnees['id'] ?>, a pour titre <?= $donnees['titre'] ?>.<br />
        le contenu de ce article est le suivant : <br />
         "<em> <?= $donnees['contenu'] ?> </em>." <br />
        <br />
        <br />
    
    <?php
    } 

    $response->closeCursor();
    ?>

<?php
$nom = 'Battlefield 1942';
$possesseur = 'Patrick';
$console = 'PC';
$prix = 45;;
$nbre_joueurs_max = 50;
$commentaires = '2nde guerre mondiale';


$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur,
console, prix, nbre_joueurs_max, commentaires) VALUES(:nom,
:possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array(
'nom' => $nom,
'possesseur' => $possesseur,
'console' => $console,
'prix' => $prix,
'nbre_joueurs_max' => $nbre_joueurs_max,
'commentaires' => $commentaires
));
echo 'Le jeu a bien été ajouté !';
?>

</body>
</html>
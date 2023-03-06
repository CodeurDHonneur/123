<?php

if (isset($_POST['firstname']) 
&& isset($_POST['lastname'])
&& isset($_POST['username'])
&& isset($_POST['password'])) {

    if ($_POST['password'] == 'kangourou') {
        echo 'Bien jouéééééééééééééééééééé !';
    } else {
        echo 'mot de passe incorrecte !';
    }
} else {
    echo 'Aucun champ ne peut être vide pour ce exercice';
}

?>
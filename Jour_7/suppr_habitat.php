<?php
    $id = ($_GET['id']);

    include('config.inc.php');
    $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);
    $requete = 'DELETE FROM habitat WHERE habitat_id = ' .$id;
    $exe = $bdd->query($requete); 

    if ($exe == false) {
        header('Location: liste_habitat.php?message=supprKo');
    } else {
        header('Location: liste_habitat.php?message=supprOk');
    }

<?php
    session_start();
    if (isset($_SESSION['utilisateur']))
    {
        include('config.inc.php');
        $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);
        $requete = 'SELECT * FROM utilisateur WHERE username = "'.$_SESSION['utilisateur'].'"';
        $exeuser = $bdd->query($requete);
        $user = $exeuser->fetch();
    } else {
        header('Location: connexion.php');
    }
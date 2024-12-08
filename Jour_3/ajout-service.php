<?php
// Fichier de BDD
include('config.inc.php');

// On récupère les données depuis le formulaire
$nom = $_POST["nom"];
$description = $_POST["description"];

// On traite les données pour les ajouter en BDD
$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

$requete = 'INSERT INTO service (nom, description) VALUES ("' . $nom .'", "' . $description .'")';
$exe = $bdd->query($requete);

header('Location: liste_service.php?message=ajoutOk');
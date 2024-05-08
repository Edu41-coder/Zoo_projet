<?php
// Fichier de BDD
include('config.inc.php');
require 'verification_connexion.php';

// On récupère les données depuis le formulaire
$nom = $_POST["nom"];
$description = $_POST["description"];
$commentaire = $_POST["commentaire_habitat"];

// On traite les données pour les ajouter en BDD
$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

$requete = 'INSERT INTO habitat (nom, description, commentaire_habitat) VALUES ("' . $nom .'", "' . $description .'", "' . $commentaire .'")';
$exe = $bdd->query($requete);

header('Location: liste_habitat.php?message=ajoutOk');
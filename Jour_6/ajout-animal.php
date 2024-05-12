<?php
// Fichier de BDD
include('config.inc.php');
require 'verification_connexion.php';

// Page du site actuelle
$page = "animal";

// On récupère les données depuis le formulaire
$prenom = $_POST["prenom"];
$etat = $_POST["etat"];
$race = $_POST["race"];
$habitat = $_POST["habitat"];


// On traite les données pour les ajouter en BDD
$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

$requete = 'INSERT INTO animal (prenom, etat, race_id, habitat_id) VALUES ("' . $prenom .'", "' . $etat .'", "' . $race .'","' . $habitat.'")';

	var_dump($requete);
$exe = $bdd->query($requete);
echo('<br><br>');
var_dump($exe);

header('Location: liste_animal.php?message=ajoutOk');

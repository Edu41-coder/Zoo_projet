<?php
// Fichier de BDD
include('config.inc.php');
require 'verification_connexion.php';

// Page du site actuelle
$page = "habitat";

// On récupère les données depuis le formulaire
$prenom = $_POST["prenom"];
// $etat = $_POST["etat"];
$etat = "";
$race = $_POST["race"];
$habitat = $_POST["habitat"];


// On traite les données pour les ajouter en BDD
$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

require('uploadimage.php');
if (empty($erreurImage) == false) {
	header('Location: liste_habitat.php?message=' . $erreurImage);
} else {
	$requete = 'INSERT INTO animal (prenom, etat, race_id, habitat_id) VALUES ("' . $prenom .'", "' . $etat .'", "' . $race .'","' . $habitat.'")';
	$exe = $bdd->query($requete);

	$idAjoutAnimal = $bdd->lastInsertId();
	$requete2 = "INSERT INTO image (image_data) VALUES ('" . $cible . "')";
	$exe2 = $bdd->query($requete2);
	$idAjoutImage = $bdd->lastInsertId();

	$requete3 = "INSERT INTO assoimage_animal (animal_id, image_id) VALUES ('" . $idAjoutAnimal . "', '" . $idAjoutImage . "')";
	$exe3 = $bdd->query($requete3);

	header('Location: liste_habitat.php?message=ajoutAnimalOk');
}

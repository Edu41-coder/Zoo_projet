<?php
// Fichier de BDD
include('config.inc.php');
require 'verification_connexion.php';

// On récupère les données depuis le formulaire
$nom = $_POST["nom"];
$description = $_POST["description"];
/* $commentaire = $_POST["commentaire_habitat"]; */
$commentaire = "";

// On traite les données pour les ajouter en BDD
$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

require('uploadimage.php');
if (empty($erreurImage) == false) {
	header('Location: liste_habitat.php?message=' . $erreurImage);
} else {
	$requete = 'INSERT INTO habitat (nom, description, commentaire_habitat) VALUES ("' . $nom .'", "' . $description .'", "' . $commentaire .'")';
	$exe = $bdd->query($requete);
	$idAjoutHabitat = $bdd->lastInsertId();
	$requete2 = "INSERT INTO image (image_data) VALUES ('" . $cible . "')";
	$exe2 = $bdd->query($requete2);
	$idAjoutImage = $bdd->lastInsertId();

	$requete3 = "INSERT INTO assoimage_habitat (habitat_id, image_id) VALUES ('" . $idAjoutHabitat . "', '" . $idAjoutImage . "')";
	$exe3 = $bdd->query($requete3);

	header('Location: liste_habitat.php?message=ajoutOk');
}
<?php
require('verification_connexion.php');
$page = 'compte';

$type = $_POST["typeForm"];

if ($type == "horaires") {
	$debut = $_POST["heureDebut"];
	$fin = $_POST["heureFin"];

	$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);
	$requete="UPDATE settings SET donnee='$debut' WHERE nom = 'ouvertureZoo'";
	$requete2="UPDATE settings SET donnee='$fin' WHERE nom = 'fermetureZoo'";
	$exe = $bdd->query($requete);
	$exe2 = $bdd->query($requete2);

	header('Location: monCompte.php?message=modifHorairesOk');
} else {
	header('Location: monCompte.php?message=erreurDansEnvoiFormulaire');
}

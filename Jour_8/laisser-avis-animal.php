<?php
// Fichier de BDD
include('config.inc.php');
require 'verification_connexion.php';

// Page du site actuelle
$page = "habitat";

// On récupère les données depuis le formulaire
$id = $_POST["id"];
$detailAvis = $_POST["detailAvis"];
$etatActuel = $_POST["etatActuel"];

$date = date("Y-m-d H:i:s"); 
$username = $userCo2['username'];

$requete = "UPDATE animal SET etat = '" . $etatActuel . "' WHERE animal.animal_id = " . $id;
$bdd->query($requete);

$requete2 = 'INSERT INTO rapport_veterinaire (date, detail, etatAvis, username, animal_id) VALUES ("' . $date .'", "' . $detailAvis .'", "' . $etatActuel .'","' . $username.'","' . $id.'")';
$bdd->query($requete2);

header('Location: liste_habitat.php?message=ajoutRapportOk');
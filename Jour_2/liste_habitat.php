<?php
include('config.inc.php');

	$message = $_GET['message'];

	if ($message == 'ajoutOk') {
		echo('<div>L\'habitat vient d\'être ajouté.</div>');
	}

	// On traite les données pour les ajouter en BDD
	$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

	$requete = 'SELECT * FROM habitat';
	$exe = $bdd->query($requete);

	if ($exe) {
	    $resultats = $exe->fetchAll(PDO::FETCH_ASSOC);

	    foreach ($resultats as $ligne) {
	        echo($ligne["nom"] . "<br>");
	        echo($ligne["description"] . "<br>");
	        echo($ligne["commentaire_habitat"] . "<br><br>");
	    }
	} else {
	    echo "Erreur lors de l'exécution de la requête SQL";
	}

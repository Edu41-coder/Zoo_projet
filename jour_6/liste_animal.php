<?php
	include('config.inc.php');
	require 'verification_connexion.php';
	$message = $_GET['message'];
	// Page du site actuelle
	$page = "animal";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des animaux</title>
    <!-- Bootstrap 5.1 CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/zoo.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
		include("menu.php");
		if ($message == 'ajoutOk') {
			echo('<div class="messageHautDePage">L\'animal vient d\'être ajouté.</div>');
		} else if ($message == 'supprOk') {
			echo('<div class="messageHautDePage">L\'animal vient d\'être supprimé.</div>');
		} else if ($message == 'modifOk') {
			echo('<div class="messageHautDePage">L\'animal vient d\'être modifié.</div>');
		} else if ($message == 'supprKo') {
			echo('<div class="messageHautDePage">L\'animal n\'a pas pu être supprimé.</div>');
		} else if ($message == 'ajoutNourritureOk') {
			echo('<div class="messageHautDePage">La nourriture vient d\'être ajoutée pour l\'animal</div>');
		} 
	?>
	<div class="container">
		<h1>Liste des animaux</h1>
		<?php if ($role == "admin") { ?>
		<div class="divDebut">
			<button type="button" class="btn btn-success btn-lg"><a class="lien" href="ajouter_animal.php">Ajouter un animal</a></button>
		</div>
	<?php
	}

	// On traite les données pour les ajouter en BDD
	$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

	$requete = 'SELECT animal.animal_id, animal.prenom, animal.etat, race.race_id, race.abel, habitat.habitat_id, habitat.nom 
				FROM animal
				LEFT JOIN race ON animal.race_id = race.race_id
				LEFT JOIN habitat ON animal.habitat_id = habitat.habitat_id;';
	$exe = $bdd->query($requete);

	if ($exe) {
	    $resultats = $exe->fetchAll(PDO::FETCH_ASSOC);

	    ?>
	    <table class="table table-striped mt10perso">
			  <thead>
			    <tr>
			      <th scope="col">Prénom</th>
			      <th scope="col">État</th>
			      <th scope="col">Race</th>
			      <th scope="col">Habitat</th>
			      <?php
		    		if ($role == "admin") { 
		    			?>
		    				<th>Modifier</th>
				      	<th>Supprimer</th>
		    			<?php
		    		} else if ($role == "employe") {
		    			?>
		    				<th>Ajouter de la nourriture</th>
		    			<?php
		    		} else if ($role == "veto") {
		    			?>
		    				<th>Consulter la nourriture donnée</th>
		    			<?php
		    		}
		    	   ?>
			    </tr>
			  </thead>
			  <tbody>
	    <?php

	    foreach ($resultats as $ligne) {
	    	?>
			    <tr>
			      <td><?php echo($ligne["prenom"]);  ?></td>
			      <td><?php echo($ligne["etat"]);  ?></td>
			      <td><?php echo($ligne["abel"]);  ?></td>
			      <td><?php echo($ligne["nom"]);  ?></td>
			      	<?php
			    		if ($role == "admin") { 
			    			?>
			    			<td><a href='modif_animal.php?id=<?php echo($ligne["animal_id"]); ?>&prenom=<?php echo($ligne["prenom"]); ?>&etat=<?php echo($ligne["etat"]); ?>&race=<?php echo($ligne["race_id"]); ?>&habitat=<?php echo($ligne["habitat_id"]); ?>' >Modifier</a></td>
					      	<td><a href='suppr_animal.php?id=<?php echo($ligne["animal_id"]); ?>' >Supprimer</a></td>
			    			<?php
			    		} else if ($role == "employe") {
			    			?><td><a href='ajout_nourriture_animal.php?id=<?php echo($ligne["animal_id"]); ?>&prenom=<?php echo($ligne["prenom"]); ?>' >Ajouter</a></td><?php
			    		} else if ($role == "veto") {
			    			?><td><a href='consulter_nourriture_animal.php?id=<?php echo($ligne["animal_id"]); ?>&prenom=<?php echo($ligne["prenom"]); ?>' >Consulter</a></td><?php
			    		}
			    	?></tr><?php
			    }
			    ?>
			    </tr>
			  </tbody>
			</table>
	    <?php
	} else {
	    echo "Erreur lors de l'exécution de la requête SQL";
	}
?>
	</div>
	<?php
        include("footer.php");
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
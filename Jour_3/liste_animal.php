<?php
	include('config.inc.php');
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
		}
	?>
	<div class="container">
		<div class="divDebut">
			<button type="button" class="btn btn-success btn-lg"><a class="lien" href="ajouter_animal.php">Ajouter un animal</a></button>
		</div>
 <?php

	// On traite les données pour les ajouter en BDD
	$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

	$requete = 'SELECT animal.prenom, animal.etat, race.abel, habitat.nom 
				FROM animal
				LEFT JOIN race ON animal.race_id = race.race_id
				LEFT JOIN habitat ON animal.habitat_id = habitat.habitat_id;';
	$exe = $bdd->query($requete);

	if ($exe) {
	    $resultats = $exe->fetchAll(PDO::FETCH_ASSOC);

	    ?>
	    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Prénom</th>
			      <th scope="col">État</th>
			      <th scope="col">Race</th>
			      <th scope="col">Habitat</th>
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
			    </tr>
	    	<?php
	    }
	    ?>
			  </tbody>
			</table>
	    <?php
	} else {
	    echo "Erreur lors de l'exécution de la requête SQL";
	}
?>
	</div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
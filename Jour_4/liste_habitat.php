<?php
	include('config.inc.php');
	$message = $_GET['message'];
	// Page du site actuelle
	$page = "habitat";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des habitats</title>
    <!-- Bootstrap 5.1 CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/zoo.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
		include("menu.php");
		if ($message == 'ajoutOk') {
			echo('<div class="messageHautDePage">L\'habitat d\'être ajouté.</div>');
		}
	?>
	<div class="container">
		<div class="divDebut">
			<button type="button" class="btn btn-success btn-lg"><a class="lien" href="ajouter_habitat.php">Ajouter un habitat</a></button>
		</div>
 <?php

	// On traite les données pour les ajouter en BDD
	$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

	$requete = 'SELECT * FROM habitat';
	$exe = $bdd->query($requete);

	if ($exe) {
	    $resultats = $exe->fetchAll(PDO::FETCH_ASSOC);

	    ?>
	    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Nom</th>
			      <th scope="col">Description</th>
			      <th scope="col">Commentaire</th>
			    </tr>
			  </thead>
			  <tbody>
	    <?php

	    foreach ($resultats as $ligne) {
	    	?>
			    <tr>
			      <td><?php echo($ligne["nom"]);  ?></td>
			      <td><?php echo($ligne["description"]);  ?></td>
			      <td><?php echo($ligne["commentaire_habitat"]);  ?></td>
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
	<?php
        include("footer.php");
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
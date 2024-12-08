<?php
	$message = $_GET['message'];
	// Page du site actuelle
	$page = "habitat";
	require 'verification_connexion_simple.php';
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
		} else if ($message == 'supprOk') {
			echo('<div class="messageHautDePage">L\'habitat vient d\'être supprimé.</div>');
		} else if ($message == 'modifOk') {
			echo('<div class="messageHautDePage">L\'habitat vient d\'être modifié.</div>');
		} else if ($message == 'supprKo') {
			echo('<div class="messageHautDePage">L\'habitat ne peut pas être supprimé car au moins un animal vit dedans.</div>');
		}
	?>
	<div class="container">
		<h1>Liste des habitats</h1>
		<?php if ($role == "admin") { ?>
		<div class="divDebut">
			<button type="button" class="btn btn-success btn-lg"><a class="lien" href="ajouter_habitat.php">Ajouter un habitat</a></button>
		</div>
 <?php
}
	// On traite les données pour les ajouter en BDD
	$bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

	$requete = 'SELECT * FROM habitat';
	$exe = $bdd->query($requete);

	if ($exe) {
	    $resultats = $exe->fetchAll(PDO::FETCH_ASSOC);

	    ?>
	    <table class="table table-striped mt10perso">
			  <thead>
			    <tr>
			      <th scope="col">Nom</th>
			      <th scope="col">Description</th>
			      <th scope="col">Commentaire</th>
			      <?php
		    		if ($role == "admin") { 
		    			?>
		    			<th>Modifier</th>
				      	<th>Supprimer</th>
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
			      <td><?php echo($ligne["nom"]);  ?></td>
			      <td><?php echo($ligne["description"]);  ?></td>
			      <td><?php echo($ligne["commentaire_habitat"]);  ?></td>
		    	<?php
		    		if ($role == "admin") { 
		    			?>
		    			<td><a href='modif_habitat.php?id=<?php echo($ligne["habitat_id"]); ?>&nom=<?php echo($ligne["nom"]); ?>&description=<?php echo($ligne["description"]); ?>&commentaire=<?php echo($ligne["commentaire_habitat"]); ?>' >Modifier</a></td>
				      	<td><a href='suppr_habitat.php?id=<?php echo($ligne["habitat_id"]); ?>' >Supprimer</a></td>
		    			<?php
		    		}
		    		?></tr><?php
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
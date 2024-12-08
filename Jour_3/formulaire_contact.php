<?php
	include('config.inc.php');
	// Page du site actuelle
	$page = "contact";
	$message = $_GET['message'];
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
		if ($message == 'mailOk') {
			echo('<div class="messageHautDePage">Merci pour votre prise de contact !</div>');
		} else if ($message == 'mailKo') {
			echo('<div class="messageHautDePage">L\'envoi du mail a échoué, veuillez réessayer.</div>');
		}
	?>
	<div class="container">
		<div id="formulaire">
			<form action="envoiMail.php" method="POST">
			    <p><input type="text" class="inputform" name="nom" placeholder="NOM COMPLET">
			    <input type="text" class="inputform" name="mail" placeholder="MAIL">
			    <br><input type="text" class="inputform" name="subject" placeholder="SUJET">
			    <br><textarea id="textareamessage" name="message" placeholder="MESSAGE..."></textarea>
			    <br><input type="submit" name="envoyer" id="valider"></p>
			</form>
		</div>
	</div>
</body>
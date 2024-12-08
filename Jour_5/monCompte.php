<?php
    require('verification_connexion.php');
	// Page du site actuelle
	$page = "compte";
	$message = $_GET['message'];
    $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);
    $requete="SELECT donnee FROM settings WHERE nom = 'ouvertureZoo'";
    $requete2="SELECT donnee FROM settings WHERE nom = 'fermetureZoo'";
    $exe = $bdd->query($requete);
    $exe2 = $bdd->query($requete2);
    if ($exe) {
        $resultats = $exe->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultats as $ligne) {
            $heureOuverture = $ligne["donnee"];
            break;
        }
    }
    if ($exe2) {
        $resultats2 = $exe2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultats2 as $ligne) {
            $heureFermeture = $ligne["donnee"];
            break;
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon compte</title>
    <!-- Bootstrap 5.1 CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/zoo.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
		include("menu.php");
		if ($message == 'modifHorairesOk') {
			echo('<div class="messageHautDePage">Vous venez de modifier les horaires du ZOO.</div>');
		} else if ($message == 'erreurDansEnvoiFormulaire') {
            echo('<div class="messageHautDePage">Une errerur a été rencontrée dans l\'envoi du formulaire.</div>');
        } else if ($message == "erreur1") {
            echo "<div class='messageHautDePage'>Ce pseudo est déjà utilisé, veuillez recommencer...</div>";
        } else if ($message == "erreur2") {
            echo "<div class='messageHautDePage'>Le mot de passe est trop court, il doit faire 10 caractères au minimum, veuillez recommencer...</div>";
        } else if ($message == "erreur3") {
            echo "<div class='messageHautDePage'>Le rôle de l'inscription n'est pas correcte, veuillez recommencer...</div>";
        } else if ($message == "ok") {
            echo "<div class='messageHautDePage'>Vous venez de créer un nouveau compte de connexion. L'utilisateur vient de recevoir un mail pour se connecter.</div>";
        }
	?>
	<div class="container">
        <h1>Mon compte</h1>
        <?php if ($role == "admin") { ?>
        <p class="mt20perso mb20perso" id="menuAdmin">
            <a class="lienMonCompte" href="monCompte.php#horaires">Horaires du ZOO</a> |
            <a class="lienMonCompte" href="monCompte.php#inscription">Inscription d'un nouvel utilisateur</a> |
            <a class="lienMonCompte" href="monCompte.php#dashboard">Dashboard</a>
        </p>
        <h2 class="mt30perso" id="horaires">Horaires du ZOO</h2>
        <div>
            <form action="execution-monCompte.php" method="POST">
                <input type="hidden" name="typeForm" value="horaires">
                <div class="form-group mt10perso">
                    <label for="heureDebut">Heure d'ouverture du zoo</label>
                    <input type="time" class="form-control" id="heureDebut" name="heureDebut" placeholder="Heure d'ouverture du zoo" value="<?php echo $heureOuverture; ?>" required>
                </div>
                <div class="form-group mt10perso">
                    <label for="heureFin">Heure de fermeture du zoo</label>
                    <input type="time" class="form-control" id="heureFin" name="heureFin" placeholder="Heure de fermeture du zoo" value="<?php echo $heureFermeture; ?>" required>
                </div>
                <button type="submit" class="btn btn-success mt10perso">Modifier les horaires</button>
                <button class="btn btn-primary mt10perso"><a class="lien" href="index.php">Voir les horaires sur la page d'accueil</a></button>
            </form>
        </div>
        <h2 class="mt30perso" id="inscription">Inscription d'un nouvel utilisateur</h2>
        <div>
            <form action="valid_inscription_depuis_admin.php" method="post">
                <div class="form-group mt10perso">
                    <label for="pseudo">Mail</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Mail" required>
                </div>
                <div class="form-group mt10perso">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="form-group mt10perso">
                    <label for="role">Rôle</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="role" id="role" required>
                        <option value="1">Vétérinaire</option>
                        <!-- option value="3">Administrateur</option -->
                        <option value="4">Employé</option>
                      </select>
                    </div>
                </div>
            <button type="submit" class="btn btn-success mt10perso">Inscrire un nouvel utilisateur</button>
        </form>
        </div>
        <h2 class="mt30perso" id="dashboard">Dashboard</h2>
        <div>
            
        </div>
    <?php } ?>
    </div>
	<?php
        include("footer.php");
    ?>
</body>
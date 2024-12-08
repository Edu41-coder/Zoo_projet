<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail de l'animal</title>
    <!-- Bootstrap 5.1 CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/zoo.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        $page = 'habitat';
        include("menu.php");
        $requete = 'SELECT animal.animal_id, animal.prenom, animal.etat, race.race_id, race.abel, habitat.habitat_id, habitat.nom 
                FROM animal
                LEFT JOIN race ON animal.race_id = race.race_id
                LEFT JOIN habitat ON animal.habitat_id = habitat.habitat_id
                WHERE animal.animal_id = ' . $_GET['id'];
        include('config.inc.php');
        $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);
        $exe = $bdd->query($requete);
        $resultats = $exe->fetch(PDO::FETCH_ASSOC);

        $requete2 = 'SELECT *
                FROM rapport_veterinaire
                WHERE rapport_veterinaire.animal_id = ' . $_GET['id'];
        $exe2 = $bdd->query($requete2);
        $resultats2 = $exe2->fetch(PDO::FETCH_ASSOC);
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        $dateFormatee = strftime('%e %B %Y', strtotime($resultats2['date']));
    ?>
    <div class="container">
        <button class="btn btn-success mt10perso"><a class="lien" href="liste_habitat.php">Retour à la liste des habitats</a></button>
        <div id="detailAnimal">
            <h1 class="mb30perso"><?php echo $resultats['prenom'] ?></h1>
            <p><span class="boldSpan">Race : </span><?php echo $resultats['abel'] ?></p>
            <p class="mb40perso"><span class="boldSpan">Habitat : </span><?php echo $resultats['nom'] ?></p>
            <h1 class="mb30perso">Avis du vétérinaire du <?php echo $dateFormatee; ?></h1>
            <p><span class="boldSpan">État actuel : </span><?php echo $resultats['etat'] ?></p>
            <p><span class="boldSpan">Détail de l'état : </span><?php echo $resultats2['detail'] ?></p>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
    <!-- Bootstrap Bundle with Popper -->
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
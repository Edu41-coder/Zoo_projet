<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Avis du vétérinaire</title>
    <!-- Bootstrap 5.1 CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/zoo.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        require 'verification_connexion.php';
        $page = 'habitat';
        include("menu.php");
        if ($role != "admin") {
            header('Location: liste_habitat.php');
        }
        $id = $_GET['id'];
        $requete = 'SELECT *
                FROM rapport_veterinaire
                WHERE rapport_veterinaire.animal_id = ' . $_GET['id'];
        $exe = $bdd->query($requete);
        $resultats = $exe->fetchAll(PDO::FETCH_ASSOC);
        setlocale(LC_TIME, 'fr_FR.UTF-8');
    ?>
    <div class="container">
        <h1>Avis du vétérinaire pour l'animal </h1>
        <?php
            foreach ($resultats as $ligne) {
                $dateFormatee = strftime('%e %B %Y', strtotime($ligne['date']));
                ?>
                    <h2 class="mt30perso">Avis du vétérinaire du <?php echo $dateFormatee; ?></H2>
                    <p class="mt10perso"><span class="boldSpan">État : </span><?php echo $ligne['etatAvis'] ?></p>
                    <p><span class="boldSpan">Détail de l'état : </span><?php echo $ligne['detail'] ?></p>
                <?php
            }
        ?>
    </div>
    <?php
        include("footer.php");
    ?>
    <!-- Bootstrap Bundle with Popper -->
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
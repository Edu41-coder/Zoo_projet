<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./styles/zoo.css" rel="stylesheet" type="text/css">
    <title>Zoo</title>
</head>

<body>
    <?php
    $message = $_GET['message'];
    if ($message == "connexionOk") {
        echo "<div>Connexion réussie ! Veuillez-vous connecter !</div>";
    }
    ?>

    <div style="margin-top:20px;">
        <ul>
            <li><a href="inscription.php">S'inscrire</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="ajouter_habitat.php">Ajouter habitat</a></li>
            <li><a href="ajouter_service.php">Ajouter service</a></li>
            <li><a href="ajouter_animal.php">Ajouter animal</a></li>
        </ul>
    </div>
</body>

</html>
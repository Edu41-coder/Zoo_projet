<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php 
        $message = $_GET['message'];
        if ($message == "ok") {
            echo "<div>Inscription réussie ! Veuillez-vous connecter !</div>";
        } else if ($message == "connexionKo1") {
            echo "<div>Le mot de passe est in correct</div>";
        } else if ($message == "connexionKo2") {
            echo "<div>Nom d'utilisateur incorrect</div>";
        } 
    ?>
    <form action="valid_connexion.php" method="POST">
        <div>
            <label>Pseudo :</label>
            <input type="text" name="pseudo" placeholder="Pseudo" required />
        </div>
        <div>
            <label>Mot de passe :</label>
            <input type="password" name="password" placeholder="Mot de passe" required />
        </div>
        <input type="submit" name="envoyer" value="Connexion">
    </form>
</body>
</html>
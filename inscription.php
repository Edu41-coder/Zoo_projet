<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <?php 
        $message = $_GET['message'];
        if ($message == "erreur1") {
            echo "<div>Ce pseudo est déjà utilisé, veuillez recommencer...</div>";
        } else if ($message == "erreur2") {
            echo "<div>Le mot de passe est trop court, il doit faire 10 caractères au minimum, veuillez recommencer...</div>";
        }
        else if ($message == "erreur3") {
            echo "<div>Le rôle de l'inscription n'est pas correcte, veuillez recommencer...</div>";
        }
    ?>
    <form action="valid_inscription.php" method="POST">
        <div>
            <label>Pseudo :</label>
            <input type="text" name="pseudo" placeholder="Pseudo" required />
        </div>
        <div>
            <label>Mot de passe :</label>
            <input type="password" name="password" placeholder="Mot de passe" required />
        </div>
        <div>
            <label>Nom :</label>
            <input type="text" name="nom" required />
        </div>
        <div>
            <label>Prénom :</label>
            <input type="text" name="prenom" required />
        </div>
        <div>
            <label>Rôle :</label>
            <select name="role" required>
                <option value="1">Vétérinaire</option>
                <option value="3">Administrateur</option>
                <option value="4">Employé</option>
            </select>
        </div>
        <input type="submit" name="envoyer" value="Connexion">
    </form>
</body>
</html>
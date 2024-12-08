<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
</head>
<body>
    <?php 
        $message = $_GET['message'];
        if ($message == "connexionOk") {
            echo "<div>Connexion réussie ! Veuillez-vous connecter !</div>";
        } 
    ?>
</body>
</html>
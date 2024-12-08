<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un habitat</title>
    <!-- Bootstrap 5.1 CSS -->
    <link href="./styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./styles/zoo.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Ajouter un habitat</h1>
    </div>
    <div class="container-fluid">
        <form action="ajout-habitat.php" method="post">
            <div class="row m-2">
                <div class="col-sm-2">
                    <label for="nom" class="form-label">Nom :</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
            </div>
            <div class="row m-2">
                <div class="col-sm-2">
                    <label for="description" class="form-label">Description :</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-sm-2">
                    <label for="commentaire_habitat" class="form-label">Commentaire :</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="commentaire_habitat" name="commentaire_habitat" required>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-sm-2">
                    <label for="image_id" class="form-label">Image / a faire après :</label>
                </div>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="image_id" name="image_id">
                </div>
            </div>
    </div>
    <div class="col-sm-10">
        <a href="./index.php" class="btn btn-outline-info">Annuler</a>
        <button type="submit" class="btn btn-info">Ajouter</button>
    </div>
    </div>
    </form>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
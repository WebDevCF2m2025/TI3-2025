<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Creation point</title>
</head>

<body>
    <?php
    require "menu.php";
    ?>
    <div class="container mt-5">
        <h1 class="text-center">Création d'un nouveau point</h1>
        <form method="post" action="" class="row g-3">
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="col-md-6">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="col-md-6">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>
            <div class="col-md-6">
                <label for="numero" class="form-label">Numéro</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="col-md-6">
                <label for="codepostal" class="form-label">Code postal</label>
                <input type="text" class="form-control" id="codepostal" name="codepostal" required>
            </div>
            <div class="col-md-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" required>
            </div>
            <div class="col-md-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary w-100">Valider</button>
            </div>
        </form>
    </div>
</body>

</html>
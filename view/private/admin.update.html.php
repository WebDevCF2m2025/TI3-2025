<?php
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ti3_2025_accueil</title>
        <link rel="icon" type="" href=""/>
        <link rel="stylesheet" href="../../public/css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>


            <?php include "../view/_menu.html.php"; ?>

            <div class="container mt-5">
                <h2 class="mb-4">Modifier une adresse</h2>
                <form method="post">
                  <div class="mb-3">
                    <label for="adresse" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
                  </div>
                  <div class="mb-3">
                  <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="adresse">
                  </div>
                  <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="number" class="form-control" id="latitude" step="any" name="latitude" placeholder="latitude">
                  </div>
                  <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="number" class="form-control" id="longitude" step="any" name="longitude"placeholder="longitude">
                  </div>
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
              </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            
    </body>
</html>
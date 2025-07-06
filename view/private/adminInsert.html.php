<!-- TI3-2025/view/private/adminInsert.html.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Nouvelle Localisation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "menu.html.php"; ?>

    <div class="container-fluid">
        <div class="p-4 rounded  my-3">
            <h2 class="my-3 text-center">Ajout d'une localisation</h2>
            <hr>
            <?php if (isset($merci)): ?>
                <div class="alert alert-success">Merci pour votre ajout !</div>
                <script>
                    setTimeout(function() {
                        window.location.href = "./?pg=admin";
                    }, 3000);
                </script>
            <?php endif; ?>

            <div class="container">
                <div class="bg-white p-4 rounded shadow my-3">
                    <h3 class="my-3">Formulaire d'insertion de localisation</h3>
                    <?php if (isset($probleme)): ?>
                        <div class="alert alert-danger">Erreur lors de l'insertion de la localisation</div>
                        <a href="javascript:history.go(-1);">Revenir et corriger</a>
                        <hr>
                    <?php endif; ?>

                    <form action="" method="post" name="localisation">
                        <div class="my-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required placeholder="Nom de la localisation">
                        </div>

                        <div class="my-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" maxlength="255" required placeholder="Adresse">
                        </div>

                        <div class="my-3">
                            <label for="codepostal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="codepostal" name="codepostal" required placeholder="Code Postal">
                        </div>

                        <div class="my-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required placeholder="Ville">
                        </div>

                        <div class="my-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required placeholder="Latitude">
                        </div>

                        <div class="my-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" required placeholder="Longitude">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-sm w-25">Envoyer</button>
                            <a class="btn btn-dark btn-sm w-25" href="?pg=admin">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
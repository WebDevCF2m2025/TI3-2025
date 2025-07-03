<!-- TI3-2025/view/private/adminInsert.html.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Nouvelle Localisation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <?php include "menu.html.php"; ?>

    <div class="container">
        <div class="bg-white p-4 rounded shadow-sm my-2">
            <h4 class="mb-3"><a href="?pg=admin">Retour à l'administration</a></h4>
            <p>Bienvenue sur votre espace d'administration, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <hr>
            <h3 class="mb-4">Formulaire d'insertion de localisation</h3>

            <?php if (isset($merci)): ?>
                <div class="alert alert-success">Merci pour votre ajout !</div>
                <script>
                    setTimeout(function() {
                        window.location.href = "./?pg=admin";
                    }, 3000);
                </script>
            <?php endif; ?>

            <div class="container">
                <div class="bg-white p-4 rounded shadow-sm mb-5">
                    <h2 class="mb-4 text-center">Ajouter une localisation</h2>

                    <?php if (isset($probleme)): ?>
                        <div class="alert alert-danger">Erreur lors de l'insertion de la localisation</div>
                        <a href="javascript:history.go(-1);">Revenir et corriger</a>
                        <hr>
                    <?php endif; ?>

                    <form action="" method="post" name="localisation">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required placeholder="Nom de la localisation">
                        </div>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" maxlength="255" required placeholder="Adresse">
                        </div>

                        <div class="mb-3">
                            <label for="codepostal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="codepostal" name="codepostal" required placeholder="Code Postal">
                        </div>

                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required placeholder="Ville">
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required placeholder="Latitude">
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" required placeholder="Longitude">
                        </div>

                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
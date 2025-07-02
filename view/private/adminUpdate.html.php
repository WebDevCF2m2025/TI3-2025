<!-- TI3-2025/view/private/adminUpdate.html.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Modification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="bg-light">
    <?php include "menu.html.php"; ?>

    <div class="container">
        <h1 class="mb-4 text-center">Administration | Modification</h1>
        <div class="bg-white p-4 rounded shadow-sm mb-5">
            <h4 class="mb-3"><a href="?pg=admin">Retour à l'administration</a></h4>
            <p>Bienvenue sur votre espace d'administration, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <hr>
            <h3 class="mb-4">Formulaire de mise à jour de la localisation "<?php echo htmlspecialchars($localisation['nom']); ?>"</h3>

            <?php if (isset($merci)): ?>
                <div class="alert alert-success">Merci pour votre mise à jour !</div>
                <script>
                    setTimeout(function() { window.location.href = "./?pg=admin"; }, 3000);
                </script>
            <?php endif; ?>

            <div class="container">
                <div class="bg-white p-4 rounded shadow-sm mb-5">
                    <h2 class="mb-4 text-center">Modification de la localisation</h2>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <a href="javascript:history.go(-1);">Revenir et corriger</a>
                        <hr>
                    <?php endif; ?>

                    <form action="" method="post" name="localisation">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($localisation['id']); ?>">

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required placeholder="Nom de la localisation" value="<?php echo htmlspecialchars($localisation['nom']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" maxlength="255" required placeholder="Adresse" value="<?php echo htmlspecialchars($localisation['adresse']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="codepostal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="codepostal" name="codepostal" required placeholder="Code Postal" value="<?php echo htmlspecialchars($localisation['codepostal']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required placeholder="Ville" value="<?php echo htmlspecialchars($localisation['ville']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required placeholder="Latitude" value="<?php echo htmlspecialchars($localisation['latitude']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" required placeholder="Longitude" value="<?php echo htmlspecialchars($localisation['longitude']); ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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

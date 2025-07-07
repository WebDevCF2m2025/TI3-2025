<!-- TI3-2025/view/private/adminUpdate.html.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Modification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "menu.html.php"; ?>

    <div class="container-fluid">
        <h1 class="text-center"></h1>
        <div class="p-4 my-3">
            <h2 class="my-3 text-center">Modification de la localisation</h2>
            <hr>
            <h3 class="my-3">Formulaire de modification de la localisation "<?php echo ($localisation['nom']); ?>"</h3>

            <?php if (isset($merci)): ?>
                <div class="alert alert-success">Merci pour votre mise à jour !</div>
                <script>
                    setTimeout(function() {
                        window.location.href = "./?pg=admin";
                    }, 3000);
                </script>
            <?php endif; ?>

            <div class="container">
                <div class="bg-white p-4 rounded shadow my-3">

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo ($error); ?></div>
                        <a href="javascript:history.go(-1);">Revenir et corriger</a>
                        <hr>
                    <?php endif; ?>

                    <form action="" method="post" name="localisation">
                        <input type="hidden" name="id" value="<?php echo ($localisation['id']); ?>">

                        <div class="my-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required placeholder="Nom de la localisation" value="<?php echo ($localisation['nom']); ?>">
                        </div>

                        <div class="my-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" maxlength="255" required placeholder="Adresse" value="<?php echo ($localisation['adresse']); ?>">
                        </div>

                        <div class="my-3">
                            <label for="codepostal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="codepostal" name="codepostal" required placeholder="Code Postal" value="<?php echo ($localisation['codepostal']); ?>">
                        </div>

                        <div class="my-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required placeholder="Ville" value="<?php echo ($localisation['ville']); ?>">
                        </div>

                        <div class="my-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required placeholder="Latitude" value="<?php echo ($localisation['latitude']); ?>">
                        </div>

                        <div class="my-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" required placeholder="Longitude" value="<?php echo ($localisation['longitude']); ?>">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-warning w-25">Mettre à jour</button>
                            <a class="btn btn-dark btn-sm w-25" href="?pg=admin">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
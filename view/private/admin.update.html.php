<?php
if (
    isset($_GET['pg']) &&
    $_GET['pg'] === 'update' &&
    !isset($error) &&
    !isset($thanks)
) {
    $doAnim = true;
} else {
    $doAnim = false;
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte interactive | Administration | Modifier un lieu</title>
    <!-- Icône -->
    <link rel="icon" type="image/png" href="img/map.png">
    <!-- Thème Bootstrap dark via Bootswatch -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/darkly/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="css/style.admin.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600&display=swap" rel="stylesheet">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body class="bg-dark" data-bs-theme="dark">
<?php include "_menu.html.php"; ?>
<h1 class="mb-4 text-center text-light title_home">Carte interactive | Administration | Modifier un lieu</h1>
<div class="container container_admin">
    <div class="bg-dark p-4 rounded shadow mb-3 text-light">
        <h4 class="mb-3 text-left">
            <a href="?pg=admin" class="btn btn-pagination">&larr; Retour à l'administration</a>
        </h4>
        <p>Bienvenue sur votre espace d'administration : <?=$_SESSION['username']?></p>
        <hr class="border-secondary">
        <h2 class="mb-3 text-center">Modifier un lieu</h2>
        <h4 class="text-light text-center small mb-3">Modifiez les champs nécéssaires</h4>
        <?php if (isset($thanks)): ?>
            <h4 class="alert alert-success text-center">Le lieu a bien été modifié !</h4>
            <script>
                setTimeout(function(){ window.location.href="./?pg=admin"; },3000);
            </script>
        <?php endif; ?>
        <div class="container px-0">
            <div class="bg-white p-4 rounded shadow-sm">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger text-center">Erreur lors de la modification du lieu</div>
                    <button type="button" class="btn btn-warning" onclick="history.back();">
                        Revenir sur le lieu et le corriger
                    </button>
                    <hr>
                <?php endif; ?>
                <form action="" method="post" name="localisation">
                    <input type="hidden" name="id" value="<?= $point['id'] ?>">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?=htmlspecialchars($point['nom'])?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?=htmlspecialchars($point['adresse'])?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numéro</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="<?=htmlspecialchars($point['numero'])?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="<?=htmlspecialchars($point['ville'])?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="codepostal" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="codepostal" name="codepostal" value="<?=htmlspecialchars($point['codepostal'])?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?=htmlspecialchars($point['latitude'])?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="<?=htmlspecialchars($point['longitude'])?>" required>
                    </div>
                    <a href="?pg=admin" class="btn btn-secondary me-2">Annuler</a>
                    <button type="submit" class="btn btn-pagination">Sauvegarder</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<?php if($doAnim): ?>
    <script src="js/script.admin.js"></script>
<?php endif; ?>
</body>
</html>

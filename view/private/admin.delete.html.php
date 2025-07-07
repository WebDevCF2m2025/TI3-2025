<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmer la suppression</title>
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
<div class="container py-5">
    <div class="card card_del shadow-sm p-4">
        <h2 class="text-danger">
            <span class="icon-warning">⚠️</span> Confirmation de suppression
        </h2>

        <?php if (isset($deletionSuccess)): ?>
            <div class="alert alert-success text-center mt-5">
                Le lieu a été supprimé avec succès !
            </div>
            <script>
                setTimeout(function(){ window.location.href="./?pg=admin"; }, 3000);
            </script>
        <?php elseif(isset($point) && !empty($point['id'])): ?>
            <p>Es-tu sûr(e) de vouloir supprimer le lieu&nbsp;:
                <strong><?= $point['nom'] ?></strong> ?
            </p>
            <p class="text-muted">
                <?= $point['adresse'] ?> <?= $point['numero'] ?> -
                <?= $point['codepostal'] ?> <?= $point['ville'] ?>
            </p>
            <form method="post" action="?pg=delete&id=<?= $point['id'] ?>" name="localisation">
                <div class="d-flex gap-2">
                    <a href="?pg=admin" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center mt-4">
                Localisation inconnue ou absente.
            </div>
            <a href="?pg=admin" class="btn btn-secondary mt-2">Retour</a>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        function Warning() {
            $('.icon-warning').fadeOut(250).fadeIn(250, Warning);
        }
        Warning();
    });
</script>
</body>
</html>
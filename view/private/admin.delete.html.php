<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmer la suppression</title>
    <!-- Thème sombre Bootswatch Darkly -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-dark" data-bs-theme="dark">
<div class="container py-5">
    <div class="card card_del shadow-sm p-4">
        <h2 class="text-danger">⚠️ Confirmation de suppression</h2>
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
</body>
</html>
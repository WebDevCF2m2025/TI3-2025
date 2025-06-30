<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmer la suppression</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-danger">⚠️ Confirmation de suppression</h2>
        <p>Es-tu sûr(e) de vouloir supprimer le lieu : <strong><?= $point['nom'] ?></strong> ?</p>
        <p class="text-muted"><?= $point['adresse'] ?> <?= $point['numero']?> -
                              <?= $point['codepostal']?> <?= $point['ville'] ?></p>

        <form method="GET" action="index.php">
            <input type="hidden" name="pg" value="delete">
            <input type="hidden" name="id" value="<?= $point['id'] ?>">

            <div class="d-flex gap-2">
                <a href="index.php?pg=admin" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

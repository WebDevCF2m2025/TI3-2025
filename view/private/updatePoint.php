<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Point</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once "../view/public/nav.php"; ?>
    <div class="container mt-5">
        <h1>Update point</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required
                    value="<?= htmlspecialchars($localisation['nom'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required
                    value="<?= htmlspecialchars($localisation['adresse'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="codepostal" class="form-label">Code Postal</label>
                <input type="text" class="form-control" id="codepostal" name="codepostal" required
                    value="<?= htmlspecialchars($localisation['codepostal'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" required
                    value="<?= htmlspecialchars($localisation['ville'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" required
                    value="<?= htmlspecialchars($localisation['latitude'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" required
                    value="<?= htmlspecialchars($localisation['longitude'] ?? '') ?>">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>

</html>
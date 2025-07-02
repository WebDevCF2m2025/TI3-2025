<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une localisation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="admin-header">
        <h1 class="main-title">Ajouter une localisation</h1>
        <div class="admin-nav">
            <a href="./?action=list" class="btn">Retour à la liste</a>
        </div>
    </header>
 
    <div class="form-container">
        <?php if (!empty($success)): ?>
            <div class="alert-success "><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
 
        <?php if (!empty($errors)): ?>
            <div class="alert-danger ">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
 
        <form class="location-form" method="post" action="">
            <div class="form-group">
                <label for="nom" class="form-label ">Nom de la localisation *</label>
                <input type="text"
                       class="form-control "
                       id="nom"
                       name="nom"
                       value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
                       required>
            </div>
 
            <div class="form-group">
                <label for="adresse" class="form-label ">Adresse *</label>
                <input type="text"
                       class="form-control "
                       id="adresse"
                       name="adresse"
                       value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>"
                       required>
            </div>
 
            <div class="form-group">
                <label for="codepostal" class="form-label ">Code postal *</label>
                <input type="text"
                       class="form-control "
                       id="codepostal"
                       name="codepostal"
                       value="<?= htmlspecialchars($_POST['codepostal'] ?? '') ?>"
                       maxlength="4"
                       required>
            </div>
 
            <div class="form-row">
                <div class="form-group form-half">
                    <label for="latitude" class="form-label ">Latitude *</label>
                    <input type="number"
                           class="form-control "
                           id="latitude"
                           name="latitude"
                           value="<?= htmlspecialchars($_POST['latitude'] ?? '') ?>"
                           required>
                </div>
 
                <div class="form-group form-half">
                    <label for="longitude" class="form-label ">Longitude *</label>
                    <input type="number"
                           class="form-control "
                           id="longitude"
                           name="longitude"
                           value="<?= htmlspecialchars($_POST['longitude'] ?? '') ?>"
                           required>
                </div>
            </div>
 
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Ajouter la localisation</button>
                <a href="./?action=list" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
 
    </div>
</body>
</html>
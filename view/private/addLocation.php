<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une localisation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
    <header class="">
        <div class="navbar bg-primary">
        <h1 class="h2 m-3 text-white">Ajouter une localisation</h1>
        <a class="btn btn-danger m-3" href="./?action=logout" >Déconnexion</a>
    </header>
 
    <div class="container">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success "><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
 
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger ">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
 
        <form class="location-form my-3" method="post" action="">
            <div class="">
                <label for="nom" class="form-label ">Nom de la localisation *</label>
                <input type="text"
                       class="form-control "
                       id="nom"
                       name="nom"
                       value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
                       required>
            </div>
 
            <div class="">
                <label for="adresse" class="form-label ">Adresse *</label>
                <input type="text"
                       class="form-control "
                       id="adresse"
                       name="adresse"
                       value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>"
                       required>
            </div>
 
            <div class="">
                <label for="codepostal" class="form-label ">Code postal *</label>
                <input type="text"
                       class="form-control "
                       id="codepostal"
                       name="codepostal"
                       value="<?= htmlspecialchars($_POST['codepostal'] ?? '') ?>"
                       maxlength="4"
                       required>
            </div>
 
            <div class="">
                <div class="form-half">
                    <label for="latitude" class="form-label ">Latitude *</label>
                    <input type="number"
                           class="form-control "
                           id="latitude"
                           name="latitude"
                           value="<?= htmlspecialchars($_POST['latitude'] ?? '') ?>"
                           step="0.000001"
                           required>
                </div>
 
                <div class="">
                    <label for="longitude" class="form-label ">Longitude *</label>
                    <input type="number"
                           class="form-control "
                           id="longitude"
                           name="longitude"
                           value="<?= htmlspecialchars($_POST['longitude'] ?? '') ?>"
                           step="0.000001"
                           required>
                </div>
            </div>
 
            <div class="form-actions mt-4">
                <button type="submit" class="btn btn-primary m-2">Ajouter la localisation</button>
                <a href="./?action=list" class="btn btn-secondary m-2">Annuler</a>
            </div>
        </form>
 
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une localisation</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- Header  -->
    <div class="navbar bg-primary">
        <h1 class="h2 m-3 text-white">Modifier une localisation</h1>
                
            <a class="btn btn-danger m-3" href="./?action=logout" >Déconnexion</a>        
    </div>

    <div class="container">       
        
            <a class="btn btn-primary m-3" href="./?action=list">← Retour à la liste</a>        
        <?php if (!empty($success)):?>
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
    
        
            <form action="" method="post" class="admin-form">
                <div class="form-group mb-3">
                    <label for="nom" class="form-label mb-0">Nom *</label>
                    <input type="text" 
                           class="form-control"
                           id="nom" 
                           name="nom" 
                           value="<?= htmlspecialchars($_POST['nom'] ?? $location['nom']) ?>" 
                           required>
                </div>

                <div class="mb-3">
                    <label for="adresse" class="form-label mb-0">Adresse *</label>
                    <input type="text" 
                           class="form-control " 
                           id="adresse" 
                           name="adresse" 
                           value="<?= htmlspecialchars($_POST['adresse'] ?? $location['adresse']) ?>" 
                           required>
                </div>

                <div class="form-group mb-3">
                    <label for="codepostal" class="form-label mb-0">Code postal *</label>
                    <input type="text" 
                           class="form-control " 
                           id="codepostal" 
                           name="codepostal" 
                           value="<?= htmlspecialchars($_POST['codepostal'] ?? $location['codepostal']) ?>" 
                           maxlength="4" 
                           required>
                </div>

                <div class="form-row">
                    <div class="mb-3">
                        <label for="latitude" class="form-label mb-0">Latitude *</label>
                        <input type="number" 
                               class="form-control " 
                               id="latitude" 
                               name="latitude" 
                               value="<?= htmlspecialchars($_POST['latitude'] ?? $location['latitude']) ?>" 
                               required>
                    </div>

                    <div class="form-group form-group-half">
                        <label for="longitude" class="form-label mb-0">Longitude *</label>
                        <input type="number" 
                               class="form-control " 
                               id="longitude" 
                               name="longitude" 
                               value="<?= htmlspecialchars($_POST['longitude'] ?? $location['longitude']) ?>" 
                               required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-warning my-4 me-3">Modifier</button>
                    <a href="./?action=list" class="btn btn-secondary my-4">Annuler</a>
                </div>
            </form>  
        
        <div class="">
            <h4 class="h4">Informations actuelles</h4>
            <p><strong>ID:</strong> <?= htmlspecialchars($location['id']) ?></p>
            
        </div>       
    </div>
</body>
</html>
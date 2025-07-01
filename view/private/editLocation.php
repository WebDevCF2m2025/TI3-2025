<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une localisation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header  -->
    <div class="admin-header">
        <h1>Modifier une localisation</h1>
        <div class="admin-nav">
            <span>Bienvenue, <?= $_SESSION['username'] ?></span>
            <a href="./?action=logout" class="btn-logout">Déconnexion</a>
        </div>
    </div>

    <div class="admin-container">
       
        <div class="breadcrumb">
            <a class="btn" href="./?action=list">← Retour à la liste</a>
        </div>

        
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

    
        <div class="form-container">
            <form action="" method="post" class="admin-form">
                <div class="form-group">
                    <label for="nom" class="form-label ">Nom *</label>
                    <input type="text" 
                           class="form-control " 
                           id="nom" 
                           name="nom" 
                           value="<?= htmlspecialchars($_POST['nom'] ?? $location['nom']) ?>" 
                           required>
                </div>

                <div class="form-group">
                    <label for="adresse" class="form-label ">Adresse *</label>
                    <input type="text" 
                           class="form-control " 
                           id="adresse" 
                           name="adresse" 
                           value="<?= htmlspecialchars($_POST['adresse'] ?? $location['adresse']) ?>" 
                           required>
                </div>

                <div class="form-group">
                    <label for="codepostal" class="form-label ">Code postal *</label>
                    <input type="text" 
                           class="form-control " 
                           id="codepostal" 
                           name="codepostal" 
                           value="<?= htmlspecialchars($_POST['codepostal'] ?? $location['codepostal']) ?>" 
                           maxlength="4" 
                           required>
                </div>

                <div class="form-row">
                    <div class="form-group form-group-half">
                        <label for="latitude" class="form-label ">Latitude *</label>
                        <input type="number" 
                               class="form-control " 
                               id="latitude" 
                               name="latitude" 
                               step="0.000001" 
                               value="<?= htmlspecialchars($_POST['latitude'] ?? $location['latitude']) ?>" 
                               required>
                    </div>

                    <div class="form-group form-group-half">
                        <label for="longitude" class="form-label ">Longitude *</label>
                        <input type="number" 
                               class="form-control " 
                               id="longitude" 
                               name="longitude" 
                               step="0.000001" 
                               value="<?= htmlspecialchars($_POST['longitude'] ?? $location['longitude']) ?>" 
                               required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Modifier</button>
                    <a href="./?action=list" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>

        
        <div class="info-box">
            <h4>Informations actuelles</h4>
            <p><strong>ID:</strong> <?= htmlspecialchars($location['id']) ?></p>
            
        </div>       
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des localisations</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <div class="admin-header">
        <h1>Gestion des localisations</h1>
        <div class="admin-nav">
            <span>Bienvenue, <?= $_SESSION['username'] ?></span>
            <a href="./?action=logout" class="btn-logout">Déconnexion</a>
        </div>
    </div>

    <div class="admin-container">
        
        <?php if (isset($_GET['deleted'])): ?>
            <div class="alert-success-custom">Localisation supprimée avec succès!</div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert-danger-custom">Erreur lors de la suppression!</div>
        <?php endif; ?>

        
        <div class="admin-actions">

            <a href="./?action=logout" class="btn-secondary">Voir la carte publique / Déconnexion</a>
        </div>

       
        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($locations)): ?>
                        <tr>
                            <td colspan="7" class="text-center">Aucune localisation trouvée</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($locations as $location): ?>
                            <tr>
                                <td><?= htmlspecialchars($location['id']) ?></td>
                                <td><?= htmlspecialchars($location['nom']) ?></td>
                                <td><?= htmlspecialchars($location['adresse']) ?></td>
                                <td><?= htmlspecialchars($location['codepostal']) ?></td>
                                <td><?= htmlspecialchars($location['latitude']) ?></td>
                                <td><?= htmlspecialchars($location['longitude']) ?></td>
                                <td class="actions-cell">
                                    <a href="./?action=edit&id=<?= $location['id'] ?>" class="btn-edit">Modifier</a>
                                    <a href="./?action=delete&id=<?= $location['id'] ?>" 
                                       class="btn-delete"
                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette localisation ?');">
                                       Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des localisations</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="admin-header">
        <h1 class="main-title">Administration - Localisations</h1>
        <div class="admin-nav">
            <span>Bonjour, <?= $_SESSION['username'] ?></span>
            <a href="./?action=logout" class="btn-logout">Déconnexion</a>
        </div>
    </header>
 
    <div class="admin-container">
        <?php if (isset($_GET['deleted']) && $_GET['deleted'] == '1'): ?>
            <div class="alert-success ">Localisation supprimée avec succès!</div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
            <div class="alert-danger ">Erreur lors de la suppression!</div>
        <?php endif; ?>
 
        <div class="admin-actions">
            <a href="./?action=add" class="btn btn-add">+ Ajouter une localisation</a>
                </div>
 
        <div class="table-responsive">
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
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette localisation?')">
                               Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
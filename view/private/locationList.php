<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des localisations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
    <header>
        <div class="navbar bg-primary">
            <span class="h4 text-white m-3">Bonjour, <?= $_SESSION['username'] ?></span>
            <a href="./?action=logout" class="btn btn-danger m-3">Déconnexion</a>
        </div>
        <div class="container"></div>
        <h1 class="h1 text-center mt-3">Administration - Localisations</h1>
        
    </header>
 
    <div class="admin-container">
        <?php if (isset($_GET['deleted']) && $_GET['deleted'] == '1'): ?>
            <div class="alert-success ">Localisation supprimée avec succès!</div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
            <div class="alert-danger ">Erreur lors de la suppression!</div>
        <?php endif; ?>
 
        <div class="container">
            <a href="./?action=add" class="btn btn-primary">+ Ajouter une localisation</a>
                
 
        <div class="">
            <table class="table table-striped mt-3">
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
                    <tr class="">
                        <td><?= htmlspecialchars($location['id']) ?></td>
                        <td><?= htmlspecialchars($location['nom']) ?></td>
                        <td><?= htmlspecialchars($location['adresse']) ?></td>
                        <td><?= htmlspecialchars($location['codepostal']) ?></td>
                        <td><?= htmlspecialchars($location['latitude']) ?></td>
                        <td><?= htmlspecialchars($location['longitude']) ?></td>
                        <td class="">
                            <a class="btn btn-warning me-2" href="./?action=edit&id=<?= $location['id'] ?>" >Modifier</a>
                            <a class="btn btn-danger" href="./?action=delete&id=<?= $location['id'] ?>"
                               
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
    </div>
   
</body>
</html>
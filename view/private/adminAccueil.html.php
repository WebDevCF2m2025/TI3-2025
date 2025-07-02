<!-- TI3-2025/view/private/adminAccueil.html.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil de l'administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="bg-light">
    <?php include "menu.html.php"; ?>

    <div class="container">
        <h1 class="mb-4 text-center">Accueil de l'administration</h1>
        <div class="bg-white p-4 rounded shadow-sm mb-5">
            <h4 class="mb-3"><a href="?pg=addLocalisation">Ajouter une localisation</a></h4>
            <p>Bienvenue sur votre espace d'administration, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <hr>
            <h3 class="mb-3">Gestion des localisations</h3>

            <?php
            // Pas de localisations
            if (empty($localisations)) {
                $h4 = "Pas encore de localisations";
            } else {
                $nbLocalisations = count($localisations);
                $pluriel = $nbLocalisations > 1 ? "s" : "";
                $h4 = "Il y a $nbLocalisations localisation$pluriel";
            }
            ?>
            <h4 class="text-secondary mb-3"><?php echo $h4; ?></h4>

            <!-- Affichage pour desktop -->
            <div class="table-responsive d-none d-md-block">
                <table class="table table-hover align-middle bg-white rounded">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Code Postal</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th scope="col" class="text-center">Modifier</th>
                            <th scope="col" class="text-center">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($localisations as $localisation): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($localisation['nom']); ?></td>
                                <td><?php echo htmlspecialchars($localisation['adresse']); ?></td>
                                <td><?php echo htmlspecialchars($localisation['codepostal']); ?></td>
                                <td><?php echo htmlspecialchars($localisation['ville']); ?></td>
                                <td><?php echo htmlspecialchars($localisation['latitude']); ?></td>
                                <td><?php echo htmlspecialchars($localisation['longitude']); ?></td>
                                <td class="text-center">
                                    <a href="?pg=update&id=<?php echo $localisation['id']; ?>" class="btn btn-warning btn-sm mb-1">Modifier</a>
                                </td>
                                <td class="text-center">
                                    <span onclick="confirm('Voulez-vous vraiment supprimer la localisation \n<?php echo htmlspecialchars($localisation['nom']); ?>') ? document.location.href='?pg=delete&id=<?php echo $localisation['id']; ?>' : ''" class="btn btn-danger btn-sm mb-1">Supprimer</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Affichage pour mobile -->
            <div class="d-block d-md-none">
                <?php foreach ($localisations as $localisation): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($localisation['nom']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($localisation['adresse']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($localisation['codepostal'] . ' ' . $localisation['ville']); ?></p>
                            <div class="d-flex gap-2">
                                <a href="?pg=update&id=<?php echo $localisation['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="#" onclick="confirm('Voulez-vous vraiment supprimer la localisation \n<?php echo htmlspecialchars($localisation['nom']); ?>') ? document.location.href='?pg=delete&id=<?php echo $localisation['id']; ?>' : ''" class="btn btn-danger btn-sm">Supprimer</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

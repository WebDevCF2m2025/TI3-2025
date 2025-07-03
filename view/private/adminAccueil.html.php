<!-- TI3-2025/view/private/adminAccueil.html.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil de l'administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "menu.html.php"; ?>

    <div class="container-fluid p-0">
        <div class="p-4 my-1">
            <h1 class="my-2 text-center">Accueil de l'administration</h1>
            <p>Bienvenue, vous êtes connecté en tant que : <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <hr>
            <h2 class="my-3">Gestion des localisations</h2>

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
            <h4 class="text-center my-3"><?php echo $h4; ?></h4>
            <a class="text-light btn btn-primary my-3 w-100" href="?pg=addLocalisation">Ajouter une localisation</a>
            <!-- Affichage pour desktop -->
            <div class="table-responsive d-block rounded">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>CP</th>
                            <th>Ville</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th class="text-center">Modifier</th>
                            <th class="text-center">Supprimer</th>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
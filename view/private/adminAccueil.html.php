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

<body class="bg-light">
    <?php include "menu.html.php"; ?>

    <div class="container-fluid">
        <div class="p-4 my-3">
            <h1 class="my-3 text-center">Accueil de l'administration</h1>
            <hr>
            <h3 class="my-3">Gestion des localisations</h3>

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

            <!-- Affichage pour desktop -->
            <div class="container table-responsive d-none d-md-block shadow rounded">
                <a class="container btn btn-secondary my-3 w-100" href="?pg=addLocalisation">Ajouter une localisation</a>
                <table class="table table-hover my-3">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($localisations as $localisation): ?>
                            <tr>
                                <td><?php echo ($localisation['nom']); ?></td>
                                <td><?php echo ($localisation['adresse']); ?></td>
                                <td><?php echo ($localisation['codepostal']); ?></td>
                                <td><?php echo ($localisation['ville']); ?></td>
                                <td><?php echo ($localisation['latitude']); ?></td>
                                <td><?php echo ($localisation['longitude']); ?></td>
                                <td class="text-center">
                                    <a href="?pg=update&id=<?php echo $localisation['id']; ?>" class="btn btn-warning btn-sm w-100">Modifier</a>
                                </td>
                                <td class="text-center">
                                    <span onclick="confirm('Voulez-vous vraiment supprimer la localisation \n<?php echo htmlspecialchars($localisation['nom']); ?>') ? document.location.href='?pg=delete&id=<?php echo $localisation['id']; ?>' : ''" class="btn btn-danger btn-sm w-100">Supprimer</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Affichage pour mobile -->
            <div class="d-block d-md-none">
                <a class="container btn btn-secondary my-3 w-100" href="?pg=addLocalisation">Ajouter une localisation</a>
                <?php foreach ($localisations as $localisation): ?>
                    <div class="card my-3">
                        <div class="card-body">
                            <p class="card-title fw-bold"><?php echo ($localisation['nom']); ?></p>
                            <p class="card-text"><?php echo ($localisation['adresse']); ?></p>
                            <p class="card-text"><?php echo ($localisation['codepostal'] . ' ' . $localisation['ville']); ?></p>
                            <div class="d-flex gap-2 align-items-center">
                                <a href="?pg=update&id=<?php echo $localisation['id']; ?>" class="btn btn-warning btn-sm w-100">Modifier</a>
                                <a href="#" onclick="confirm('Voulez-vous vraiment supprimer la localisation \n<?php echo ($localisation['nom']); ?>') ? document.location.href='?pg=delete&id=<?php echo $localisation['id']; ?>' : ''" class="btn btn-danger btn-sm w-100">Supprimer</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
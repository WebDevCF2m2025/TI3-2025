<?php
if (
    isset($_GET['pg']) &&
    $_GET['pg'] === 'admin' &&
    !isset($_GET['page'])
) {
    $doAnim = true;
} else {
    $doAnim = false;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte interactive | Accueil de l'administration</title>
    <!-- Icône -->
    <link rel="icon" type="image/png" href="img/map.png">
    <!-- Thème Bootstrap dark via Bootswatch -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/darkly/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="css/style.admin.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600&display=swap" rel="stylesheet">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>
<body class="bg-dark" data-bs-theme="dark">
<?php include "_menu.html.php"; ?>
<h1 class="mb-4 text-center text-light title_home">Carte interactive | Accueil de l'administration</h1>
<div class="container container_admin">
    <div class="bg-dark p-4 rounded shadow mb-3 text-light">
        <a class="btn btn-pagination mb-3" href="?pg=addLoc">Ajouter une localisation</a>
        <p>Bienvenue sur votre espace d'administration : <?=$_SESSION['username']?></p><hr class="border-secondary">
        <h2 class="mb-3 text-center">Gestion des localisations</h2>

        <?php
        // pas de localisation publiée
        if(empty($points)):
            $h4 = "Pas encore de lieu";
        else:
            $nbLoc = count($points);
            $pluriel = $nbLoc>1? "s":"";
            $h4 = "Il y a $totalLoc localisation$pluriel dans la base de données";
        endif;
        ?>
        <h4 class="text-light text-center small mb-3"><?=$h4?></h4>

        <!-- Affichage pour desktop -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle rounded table-dark">
                <caption>Liste des localisations</caption>
                <thead class="table-secondary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Numéro</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Code postal</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach ($points as $point): ?>
                    <tr class="trLoc">
                        <td>
                            <?= $point['id'] ?>
                        </td>
                        <td>
                            <?= $point['nom'] ?>
                        </td>
                        <td>
                            <?= $point['adresse'] ?>
                        </td>
                        <td>
                            <?= $point['numero'] ?>
                        </td>
                        <td>
                            <?= $point['ville'] ?>
                        </td>
                        <td>
                            <?=$point['codepostal'] ?>
                        </td>
                        <td>
                            <?=$point['latitude'] ?>
                        </td>
                        <td>
                            <?=$point['longitude'] ?>
                        </td>
                        <td>
                            <a href="?pg=update&id=<?= $point['id']?>" class="btn btn-warning btn-sm">Modifier</a>
                        </td>
                        <td>
                            <a href="?pg=confirm_delete&id=<?= $point['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Affichage carte mobile (md uniquement) -->
        <div class="d-block d-lg-none">
            <?php foreach ($points as $point): ?>
                <div class="card mb-3 bg-dark text-light border-secondary">
                    <div class="card-body">
                        <h5 class="card-title"><?= $point['nom'] ?></h5>
                        <p class="mb-1"><strong>ID :</strong> <?= $point['id'] ?></p>
                        <p class="mb-1"><strong>Adresse :</strong> <?= $point['adresse'] ?></p>
                        <p class="mb-1"><strong>Numéro :</strong> <?= $point['numero'] ?></p>
                        <p class="mb-1"><strong>Ville :</strong> <?= $point['ville'] ?></p>
                        <p class="mb-1"><strong>Code postal :</strong> <?= $point['codepostal'] ?></p>
                        <p class="mb-1"><strong>Latitude :</strong> <?= $point['latitude'] ?></p>
                        <p class="mb-3"><strong>Longitude :</strong> <?= $point['longitude'] ?></p>
                        <a href="?pg=update&id=<?= $point['id'] ?>" class="btn btn-warning btn-sm me-1">Modifier</a>
                        <a href="?pg=confirm_delete&id=<?= $point['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Pagination -->
<?php if ($totalPages > 1): ?>
    <nav aria-label="Pagination" class="mt-4 anim_pagination">
        <ul class="pagination justify-content-center">
            <!-- Bouton précédent -->
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?pg=admin&page=<?= $page - 1 ?>" tabindex="-1">Précédent</a>
            </li>
            <!-- Liens vers chaque page -->
            <?php for($p=1; $p<=$totalPages; $p++): ?>
                <li class="page-item <?= $page === $p ? 'active' : '' ?>">
                    <a class="page-link" href="?pg=admin&page=<?= $p ?>"><?= $p ?></a>
                </li>
            <?php endfor; ?>
            <!-- Bouton suivant -->
            <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?pg=admin&page=<?= $page + 1 ?>">Suivant</a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<?php if ($doAnim): ?>
    <script src="js/script.admin.js"></script>
<?php endif; ?>

</body>
</html>

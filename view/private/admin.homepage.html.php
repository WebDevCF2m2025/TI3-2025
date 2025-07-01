<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte interactive | Accueil de l'administration</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
include "_menu.html.php";
?>
<h1 class="mb-4 text-center">Carte interactive | Accueil de l'administration</h1>
<div class="container">
    <div class="bg-white p-4 rounded shadow mb-3">
        <h4 class="mb-3 text-left mb-3"><a href="?pg=addLoc">Ajouter une localisation</a></h4>
        <p>Bienvenue sur votre espace d'administration : <?=$_SESSION['username']?></p><hr>
        <h2 class="mb-3 text-center mb-3">Gestion des localisations</h2>

        <?php
        // pas de localisation publiés
        if(empty($points)):
            $h4 = "Pas encore de localisation";
        else:
            $nbLoc = count($points);;
            $pluriel = $nbLoc>1? "s":"";
            $h4 = "Il y a $totalLoc localisation$pluriel";
        endif;
        ?>
        <h4 class="text-secondary text-center small mb-3"><?=$h4?></h4>

        <!-- Affichage pour desktop -->
        <div class="table-responsive d-none d-lg-block">
            <table class="table table-hover align-middle bg-white rounded">
                <thead class="table-light">
                <tr>
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
                <tbody>
                <?php foreach ($points as $point): ?>
                <tr>
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
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Affichage carte mobile (md uniquement) -->
        <div class="d-block d-lg-none">
            <?php foreach ($points as $point): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $point['nom'] ?></h5>
                        <p class="mb-1"><strong>Adresse :</strong> <?= $point['adresse'] ?> <?= $point['numero'] ?></p>
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
    <nav aria-label="Pagination" class="mt-4">
        <ul class="pagination justify-content-center">
            <!-- Bouton précedent -->
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
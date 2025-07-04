<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC-CRUD-Procedural | Accueil de l'administration</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/style.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />
</head>
<body class="bg-light">
<?php
include "../view/_menu.html.php";
?>
<h1 class="mb-4 text-center">Administration</h1>
<div class="container">
    <div class="bg-secondary p-4 rounded shadow-sm mb-5">
        <h4 class="mb-3 text-left mb-3"><a class="text-white link-offset-2 link-underline link-underline-opacity-0" href="?pg=addMarker">Ajouter un lieu</a></h4>
        <p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
        <!-- <h3 class="mb-3 text-left mb-3">Gestion des articles</h3> -->

  

        <!-- Affichage pour desktop -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover align-middle bg-white rounded">
                <thead class="table-secondary">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col" class="text-center">Modifier</th>
                    <th scope="col" class="text-center">Supprimer</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                foreach ($listes as $liste): ?>
                        <tr>
                            <td>
                                <?php echo $liste['nom'] ?>
                            </td>
                            <td>
                                <?php echo ($liste['adresse']) ?>
                            </td>
                            <td>
                                <?php $liste['latitude'] ?>
                            </td>
                            <td class="text-center">
                                <?php $liste['longitude'] ?>
                            </td>
                            <td>
                                <a href="?pg=update&id=<?= $liste['id']?>" class="btn btn-warning btn-sm mb-1">Modifier</a>
                            </td>
                            <td>
                                <span onclick="confirm('Voulez-vous vraiment supprimer la localisation \n<?= $liste['nom']?>')? document.location.href='?pg=delete&id=<?= $liste['id']?>': ''" class="btn btn-danger btn-sm mb-1">Supprimer</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>

        <!-- Affichage carte mobile (sm uniquement) -->
        <div class="d-block d-md-none">
            <?php foreach ($articles as $article): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['title'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $article['username'] ?> — <?= $article['articledatepublished'] ?></h6>
                        <p class="card-text"><?=cutTheText($article['articletext'])?></p>
                        <div class="mb-2">
                            <?= $article['articlepublished'] ? '<span class="badge bg-success">Publié</span>' : '<span class="badge bg-secondary">Non publié</span>' ?>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="?pg=update&id=<?= $liste['id']?>" class="badge bg-warning">Modifier</a>
                        </div>
                        <div class="d-flex gap-2">
                        <a href="" onclick="confirm('Voulez-vous vraiment supprimer l\'article \n<?= $liste['slug']?>')? document.location.href='?pg=delete&id=<?= $liste['id']?>': ''" class="badge bg-danger">Supprimer</a>
                        </div>
                        </div>
                </div>
            <?php endforeach; ?>
        </div>
                
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
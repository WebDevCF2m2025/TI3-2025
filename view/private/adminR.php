<?="/adminR";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC-CRUD-Procedural | Accueil de l'administration</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="bg-light">
<?php
include_once "../view/menu.php"; 
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Accueil de l'administration</h1>
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm mb-5">
        <h4 class="mb-3 text-left mb-3"><a href="?pg=adminC">Ajouter un article</a></h4>
<p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
        <h3 class="mb-3 text-left mb-3">Gestion des articles</h3>

        <?php
        // pas d'articles publiés
        if(empty($articles)):
            $h4 = "Pas encore d'articles";
        else:
            $nbArticles = count($articles);
            $pluriel = $nbArticles>1? "s":"";
            $h4 = "Il y a $nbArticles article$pluriel";
        endif;
        ?>
    <h4 class="text-secondary text-left mb-3"><?=$h4?></h4>

        <!-- Affichage pour desktop -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover align-middle bg-white rounded">
                <thead class="table-light">
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Texte</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date</th>
                    <th scope="col">Publié</th>
                    <th scope="col" class="text-center">Modifier</th>
                    <th scope="col" class="text-center">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                                <td>
                                    <?= $article['title'] ?>
                                </td>
                                <td>

                                    <?= cutTheText($article['articletext']) ?>
                                </td>
                                <td>
                                    <?= $article['username'] ?>
                                </td>
                        <td>
                            <?= $article['articledatepublished'] ?>
                        </td>
                                <td class="text-center">
                                  <?=$article['articlepublished']===1?  '✅':'❌' ?>
                                </td>
                                <td>
                                    <a href="?pg=update&id=<?= $article['idarticle']?>" class="btn btn-warning btn-sm mb-1">Modifier</a>
                                </td>
                        <td>
                            <span onclick="confirm('Voulez-vous vraiment supprimer l\'article \n<?= $article['slug']?>')? document.location.href='?pg=delete&id=<?= $article['idarticle']?>': ''" class="btn btn-danger btn-sm mb-1">Supprimer</span>
                        </td>
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
                            <a href="?pg=update&id=<?= $article['idarticle']?>" class="badge bg-warning">Modifier</a>
                        </div>
                        <div class="d-flex gap-2">
                        <a href="" onclick="confirm('Voulez-vous vraiment supprimer l\'article \n<?= $article['slug']?>')? document.location.href='?pg=delete&id=<?= $article['idarticle']?>': ''" class="badge bg-danger">Supprimer</a>
                        </div>
                        </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


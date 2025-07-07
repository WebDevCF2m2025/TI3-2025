<?php //"/adminR";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="body" data-bs-theme="dark">
<?php
include_once "../view/menu.php"; 
?>
<h1 class="mb-4 text-center">Administration</h1>
<div class="container">
    <div class="bg-dark p-4 rounded shadow-sm mb-5">
        <h4 class="mb-3 text-left mb-3"><a  class="btn btn-success" href="?pg=adminC">Ajouter une adresse</a></h4>
<p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
        <h3 class="mb-3 text-left mb-3">Gestion des articles</h3>

        <?php
        // pas d'articles publiés
        if(empty($lists)):
            $h4 = "Pas encore d'articles";
        else:
            $nbAdresse = count($lists);
            $pluriel = $nbAdresse>1? "s":"";
            $h4 = "Il y a $nbAdresse article$pluriel";
        endif;
        
        ?>
    <h4 class="text-secondary text-left mb-3"><?=$h4?></h4>

        <!-- Affichage pour desktop -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover align-middle bg-dark rounded">
                <thead class="table-success">
                    <tr>
                        <th scope="col">nom</th>
                        <th scope="col">adresse</th>
                        <th scope="col">codepostal</th>
                        <th scope="col">latitude</th>
                        <th scope="col">longitude</th>
                        <th scope="col" class="text-center">Modifier</th>
                        <th scope="col" class="text-center">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lists as $list): ?>
                        <tr>
                            <td>
                                <?= $list['nom'] ?>
                            </td>
                            <td>
                                <?= cutTheText($list['adresse']) ?>
                            </td>
                            <td>
                                <?= $list['codepostal'] ?>
                            </td>
                            <td>
                                <?= $list['latitude'] ?>
                            </td>
                            <td class="text-center">
                                <?= $list['longitude'] ?>
                            </td>
                            <td>
                                <a href="?pg=adminU&id=<?= $list['id']?>" class="btn btn-warning mx-auto btn-sm mb-1">Modifier</a>
                            </td>
                            <td>
                                <span onclick="confirm('Voulez-vous vraiment supprimer l\'adresse \n<?= $list['nom']?>')? document.location.href='?pg=delete&id=<?= $list['id']?>': ''" class="btn btn-danger btn-sm mb-1">Supprimer</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                
                </tbody>
            </table>
        </div>

        <!-- Affichage carte mobile (sm uniquement) -->
        <div class="d-block d-md-none">
            <?php foreach ($lists as $list): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $list['nom'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $list['adresse'] ?> — <?= $list['codepostal'] ?></h6>
                        <h6 class="card-text"><?=$list['latitude']?></h6>
                        <h6 class="card-text"><?= $list['longitude'] ?></h6>
                        <div class="d-flex gap-2">
                            <a href="?pg=adminU&id=<?= $list['id']?>" class="badge bg-warning">Modifier</a>
                            <a href="" onclick="confirm('Voulez-vous vraiment supprimer l\'article \n<?= $list['nom']?>')? document.location.href='?pg=delete&id=<?= $list['nom']?>': ''" class="badge bg-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>
</html>


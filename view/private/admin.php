<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    require "menu.php";
    ?>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Tableau des localisations</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>adresse</th>
                    <th>numero</th>
                    <th>ville</th>
                    <th>codepostal</th>
                    <th>latitude</th>
                    <th>longitude</th>
                    <th>delete</th>
                    <th>update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($localisations as $l):
                ?>
                    <tr>
                        <td><?= $l['id'] ?></td>
                        <td><?= $l['nom'] ?></td>
                        <td><?= $l['adresse'] ?></td>
                        <td><?= $l['numero'] ?></td>
                        <td><?= $l['ville'] ?></td>
                        <td><?= $l['codepostal'] ?></td>
                        <td><?= $l['latitude'] ?></td>
                        <td><?= $l['longitude'] ?></td>
                        <td><a href="./?pg=delete&idLocalisation=<?=$l['id']?>"><button class="btn btn-danger btn-sm">Supprimer</button></a></td>
                        <td><a href="./?pg=update&idLocalisation=<?=$l['id']?>"><button class="btn btn-success btn-sm">Modifier</button></a></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
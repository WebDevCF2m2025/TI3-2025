<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MVC-CRUD-Procedural | Connexion</title>
  <link rel="icon" type="image/x-icon" href="img/logo.png"/>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
<?php
  include "menu.html.php";
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Connexion</h1>
<div class="container">
  <div class="bg-white p-4 rounded shadow-sm mb-5">
    <h1>ADMIN</h1>
</div>
  <div class="table-responsive d-none d-md-block">
    <table class="table table-hover align-middle bg-white rounded">
      <thead class="table-dark">
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Code postal</th>
        <th scope="col">Ville</th>
        <th scope="col">Nombre Vélo</th>
        <th scope="col">Latitude</th>
        <th scope="col">Longitude</th>
        <th scope="col" class="text-center">Modifier</th>
        <th scope="col" class="text-center">Supprimer</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($markers as $marker): ?>
      <tr>
        <td>
          <?= $marker['nom'] ?>
        </td>
        <td>

          <?=$marker['adresse'] ?>
        </td>
        <td>
          <?= $marker['codepostal'] ?>
        </td>
        <td>
          <?= $marker['ville'] ?>
        </td>
        <td class="text-center">
          <?=$marker['nb_velos'] ?>
        </td>
        <td>
          <?=$marker['latitude'] ?>
        </td>
        <td>
          <?=$marker['longitude'] ?>
        </td>
        <td>
          <a href="?pg=update&id=<?= $marker['id']?>" class="btn btn-warning btn-sm mb-1">Modifier</a>
        </td>
        <td>
          <span onclick="confirm('Voulez-vous vraiment supprimer l\'article \n<?= $marker['adresse']?>')? document.location
            .href='?pg=delete&id=<?= $marker['id']?>': ''" class="btn btn-danger btn-sm mb-1">Supprimer</span>
        </td>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


    <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

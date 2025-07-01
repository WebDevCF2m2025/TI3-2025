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
  <style>
    body {

      font-family: "impact Strive", ui-serif;
      color: white;
    }
    h3 {
      text-align: center;
      margin-top: 20px;
      color: white;
    }
  </style>
</head>
<body class="bg-light">
<?php
  include "menu.html.php";
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Connexion</h1>
<div class="container">
  <div class="bg-secondary bg-opacity-50 p-4 rounded shadow-sm mb-5">
    <h1>ADMIN</h1>
    <h4 class="mb-3 text-left mb-3"><a href="?pg=addMarker">Inserer un marqueur</a></h4>
    <?php
    $countmarks = countMarkers($db);
    if(empty($countmarks)):
    ?>
    <h4 class="alert alert-danger">Aucun marqueur n'a été trouvé !</h4>
    <?php
    else:
    $pluriel = $countmarks > 1 ? 's' : '';
      ?>
    <h5 class="mb-3 text-left mb-3 text-dark">Il y'a <?=$countmarks?> Marqueur<?=$pluriel ?></h5>
    <?php
    endif;
    ?>
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
      <?php foreach ($marks as $marker): ?>
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
          <a href="?pg=update&id=<?= $marker['id']?>" class="btn btn-warning btn-sm">Modifier</a>
        </td>
        <td>
          <a href="?pg=delete&id=<?= $marker['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
        </td>

        <?php endforeach; ?>
      </tbody>
    </table>
    <h3><?=$pagination ?></h3>
  </div>


    <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

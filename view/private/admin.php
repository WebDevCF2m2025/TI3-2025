<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Administration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body class="bg-dark text-light">

  <?php require "menu.php"; ?>

  <div class="container mt-5">
    <h1 class="mb-4 text-center">Tableau des localisations </h1>
    <?php
    if (!empty($localisations)):
      $nbloc = count($localisations);
      $nbloc > 1 ? $pluriel = "x" : $pluriel = "";
    ?>
      <h2 class="mb-3">Il y a <?= $nbloc ?> lieu<?= $pluriel ?> <i class="bi bi-arrow-down-square"></i></h2>
      <div class="table-responsive shadow-lg rounded">
        <table class="table table-dark table-hover align-middle">
          <thead>
            <tr>
              <th>id</th>
              <th>nom</th>
              <th>adresse</th>
              <th>numero</th>
              <th>ville</th>
              <th>codepostal</th>
              <th>latitude</th>
              <th>longitude</th>
              <th>Supprimer</th>
              <th>Modifier</th>
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
                <td>
                  <a onclick="if(confirm('Voulez-vous vraiment supprimer l\'article : <?= addslashes(html_entity_decode($l['nom'])); ?> ?')){window.location.href='./?pg=delete&idLocalisation=<?= $l['id'] ?>';}" class="btn btn-danger btn-sm rounded-3">
                    Supprimer
                  </a>
                </td>
                <td>
                  <a href="./?pg=update&idLocalisation=<?= $l['id'] ?>" class="btn btn-success btn-sm rounded-3">
                    Modifier
                  </a>
                </td>
              </tr>
            <?php
            endforeach;
          else:
            ?>
            <tr>
              <td colspan="10" class="text-center align-middle">
                <strong><i class="bi bi-info-circle-fill me-2"></i> Pas encore de Lieux</strong>
              </td>
            </tr>
          <?php
          endif;
          ?>
          </tbody>
        </table>
      </div>
  </div>
     <?php require "footer.php"; ?>
     
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
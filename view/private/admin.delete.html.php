<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Confirmer la suppression</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" />
  <style>
    body {

      font-family: "impact-Strive", ui-serif;
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
<div class="container py-5">
  <div class="card shadow-sm p-4">
    <h2 class="text-danger">⚠️ Confirmation de suppression</h2>
    <?php if (isset($deletionSuccess)): ?>
      <div class="alert alert-success text-center mt-5">
        Le lieu a été supprimé avec succès !
      </div>
      <script>
        setTimeout(function(){ window.location.href="./?pg=admin"; }, 3000);
      </script>
    <?php elseif(isset($marker) && !empty($marker['id'])): ?>
      <p>Es-tu sûr(e) de vouloir supprimer le lieu :
        <strong><?= $marker['nom'] ?></strong> ?
      </p>
      <p class="text-muted">
        <?= $marker['adresse'] ?> <?= $marker['nom'] ?> -
        <?= $marker['codepostal'] ?> <?= $marker['ville'] ?>
        <?= $marker['nb_velos'] ?>
      </p>
      <form method="post" action="?pg=delete&id=<?= $marker['id'] ?>" name="localisation">
        <div class="d-flex gap-2">
          <a href="?pg=admin" class="btn btn-secondary">Annuler</a>
          <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
        </div>
      </form>
    <?php else: ?>
      <div class="alert alert-danger text-center mt-4">
        Localisation inconnue ou absente.
      </div>
      <a href="?pg=admin" class="btn btn-secondary mt-2">Retour</a>
    <?php endif; ?>
  </div>
</div>
</body>
</html>


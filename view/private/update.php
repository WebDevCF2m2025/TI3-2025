<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update du point</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-dark text-light">

  <?php
  require "menu.php";
  ?>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Update du point</h1>
    <form method="post" action="" class="row g-3">
      <input id="idloc" type="hidden" name="idLocalisation" value="<?=$OneLocal['id']?>">

      <div class="col-md-6">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control bg-dark text-light" id="nom" name="nom" value="<?=$OneLocal['nom']?>" required />
      </div>
      <div class="col-md-6">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control bg-dark text-light" id="adresse" name="adresse" value="<?=$OneLocal['adresse']?>" required />
      </div>
      <div class="col-md-6">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control bg-dark text-light" id="ville" name="ville" value="<?=$OneLocal['ville']?>" required />
      </div>
      <div class="col-md-6">
        <label for="numero" class="form-label">Numéro</label>
        <input type="text" class="form-control bg-dark text-light" id="numero" name="numero" value="<?=$OneLocal['numero']?>" required />
      </div>
      <div class="col-md-6">
        <label for="codepostal" class="form-label">Code postal</label>
        <input type="text" class="form-control bg-dark text-light" id="codepostal" name="codepostal" value="<?=$OneLocal['codepostal']?>" required />
      </div>
      <div class="col-md-6">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="text" class="form-control bg-dark text-light" id="latitude" name="latitude" value="<?=$OneLocal['latitude']?>" required />
      </div>
      <div class="col-md-6">
        <label for="longitude" class="form-label">Longitude</label>
        <input type="text" class="form-control bg-dark text-light" id="longitude" name="longitude" value="<?=$OneLocal['longitude']?>" required />
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-success w-100">Modifier le point n° <?=$OneLocal['id']?></button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

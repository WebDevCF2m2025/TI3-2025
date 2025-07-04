<?php include "../view/_menu.html.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire Adresse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Ajouter une adresse</h2>
    <form>
      <div class="mb-3">
        <label for="adresse" class="form-label">Nom</label>
        <input type="text" class="form-control" id="adresse" placeholder="">
      </div>
      <div class="mb-3">
      <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="adresse" placeholder="123 rue Exemple">
      </div>
      <div class="mb-3">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="number" class="form-control" id="latitude" step="any" placeholder="50.8503">
      </div>
      <div class="mb-3">
        <label for="longitude" class="form-label">Longitude</label>
        <input type="number" class="form-control" id="longitude" step="any" placeholder="4.3517">
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
          integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
          crossorigin=""></script>
  <title>Carte interactif</title>
</head>
<body>
<div class="top-page">
  <h1>Carte interactive</h1>
  <h3>Parcours BD à Bruxelles</h3>
  <?php
  // Si l'utilisateur est connecté, on affiche le bouton de déconnexion
  if (isset($_SESSION['username'])) :
  ?>
  <button><a href="?pg=logout"> Déconnexion </a></button>
  <button><a href="?pg=admin"> Administration </a></button>
  <?php
  else:
  ?>
  <button><a href="?pg=login"> Connexion à l'administration</a></button>
  <?php
  endif;
  ?>

</div>

<div class="main-page">
  <div class="map-container" >
    <div id="map" ></div>
  </div>

  <div>
    <div style="text-align: center">liste des Points</div>
    <p style="text-align: center">Cliquez sur un element ci-dessous pour le situer sur la carte.</p>
    <hr>
    <ul id="points-list">
      <?php
      // On affiche la liste des points

      foreach ($markers as $marker) {

          echo "<li >{$marker['nom']}  | {$marker['adresse']} - {$marker['codepostal']}  {$marker['ville']}</li>";
          // zoom on the marker when clicked

      }
      ?>
  </div>
</div>

<!-- Script File -->
  <script src="js/script.js"></script>
<script>
  // Ajout des marqueurs
  <?php foreach ($markers as $marker): ?>
    L.marker([<?= $marker['latitude'] ?>, <?= $marker['longitude'] ?>])
        .addTo(map)
      .bindPopup(` <ul>
      <li> <?= addslashes($marker['adresse']) ?>  </li>
      <li> <?= addslashes($marker['codepostal']) ?> <?= addslashes($marker['ville']) ?> </li>
      <li> <?= addslashes($marker['nb_velos']) ?> </li>
      </ul> `)

      // FlyTO
      .on('click', function() {
          map.flyTo([<?= $marker['latitude'] ?>, <?= $marker['longitude'] ?>], 15);
      });

  <?php endforeach; ?>

</script>
</body>
</html>


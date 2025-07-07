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
  <h1 class="title">My-Map</h1>
  <h3 class="sd-title" >Carte interactive</h3>
  <?php
  // Si l'utilisateur est connecté, on affiche le bouton de déconnexion
  if (isset($_SESSION['username'])) :
  ?>
  <button style="margin-right: 20px" class="anime"><a href="?pg=logout"> Déconnexion </a></button>
  <button class="anime"><a href="?pg=admin"> Administration </a></button>
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

  <div class="points">
    <div class="lst" style="text-align: center">liste des Points</div>
    <p class="lst" style="text-align: center">Cliquez sur un element ci-dessous pour le situer sur la carte.</p>
    <hr>
    <div id="sidebar" class="point sidebar">
    <ul id="loc-list"></ul>
    </div>
  </div>
</div>

<!-- Script File -->
  <script src="js/script.js"></script>
</body>
</html>


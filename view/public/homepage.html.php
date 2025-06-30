<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
          integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
          crossorigin=""></script>
  <title>Carte interactif</title>
</head>
<body class="bg-secondary">
<?php
include "_menu.html.php";
?>
<h1 class="mb-4 text-center text-white">Carte inzzteractive</h1>
<div class="container">
  <div class="bg-white p-4 rounded shadow-sm mb-5">
    <h2 class="mb-4 text-center">Carte des C2</h2>
    <p>Voici une carte interactive où vous pouvez voir les emplacements des C2.</p>
    <div id="map" style="height: 500px"></div>
  </div>

<!-- Script File -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="script/script.js"></script>
</body>
</html>
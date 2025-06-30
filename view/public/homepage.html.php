<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TI3-2025 | Accueil</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
<h1>Carte interactive</h1>
<h2>Parcours BD à Bruxelles</h2>
<button><a href="./">Connexion à l'administration</a></button>

<!-- Carte -->
<div id="map"></div>

<!-- Liste des points -->
<div id="points">
    <h2>Liste des points</h2>
    <h3>Cliquez sur un élément dans la liste ci-dessous pour la situer sur la carte</h3>
    <hr>
</div>

<!-- Script Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="">
</script>
<script>
    const map = L.map('map').setView([50.8503396, 4.3517103], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);
</script>
</body>
</html>
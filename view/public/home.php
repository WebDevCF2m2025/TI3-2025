<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Fetch</title>
    <!-- CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- ma CSS -->
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <h1>Test Fetch</h1>
    <button onclick="testFetch()">Charger les données</button>
    <div id="carte"></div>

    <!-- JS de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- mon JS -->
    <script>
        /* créer une variable map qui va s'afficher dans le conteneur dont l'id vaut carte */
        let carte = L.map('carte');

        /* définir sur quelle position est centrée la carte */
        /* latitude, longitude ainsi que le zoom */
        carte.setView([50.825540, 4.338905], 14);

        /* choisir le fond de carte et l'ajouter à la carte */
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
    </script>
    <script src="js/geo.js"></script>
</body>
</html>
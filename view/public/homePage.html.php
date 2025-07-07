<!-- TI3-2025/view/public/homePage.html.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body>
    <?php include "menuPublic.html.php"; ?>
    <div>
        <h1>Carte interactive.</h1>
        <h2>Parcours Salle de sports à Bruxelles</h2>
        <br>
        <div class="grille">
            <div class="map">
                <div id="carteAccueil"></div>
            </div>
            <div class="tableau">
                <h3>Liste des points</h3>
                <p>Cliquez sur un élément dans la liste ci-dessous pour le situer sur la carte</p>
                <ul>
                    <?php foreach ($localisations as $localisation): ?>
                        <li>
                            <a href="#" onclick="flyToLocation(<?php echo $localisation['latitude']; ?>, <?php echo $localisation['longitude']; ?>)">
                                <?php echo $localisation['nom'] . " - " . $localisation['adresse'] . " - " . $localisation['codepostal'] . " - " . $localisation['ville']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        let map = L.map('carteAccueil').setView([50.8503, 4.3517], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function flyToLocation(lat, lng) {
            map.flyTo([lat, lng], 15);
        }

        <?php foreach ($localisations as $localisation): ?>
            L.marker([<?php echo $localisation['latitude']; ?>, <?php echo $localisation['longitude']; ?>])
                .addTo(map)
                .bindPopup("<?php echo $localisation['nom'] . " <br> " . $localisation['adresse'] . " <br> " . $localisation['codepostal'] . " <br> " . $localisation['ville']; ?>");
        <?php endforeach; ?>
    </script>
</body>

</html>
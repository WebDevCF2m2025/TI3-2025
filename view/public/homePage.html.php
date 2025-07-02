<!-- TI3-2025/view/public/homePage.html.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body>
    <?php include "menu.html.php"; ?>
    <div>
        <h1>Carte interactive.</h1>
        <h2>Parcours Salle de sports à Bruxelles</h2>
        <!-- <button onclick="window.location.href='?pg=login'">Connexion à l'administration</button> -->
        <br>
        <div class="grille">
            <div class="map">
                <div id="carte" class="rounded-4"></div>
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
        let map = L.map('carte').setView([50.8503, 4.3517], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function flyToLocation(lat, lng) {
            map.flyTo([lat, lng], 15);
        }

        <?php foreach ($localisations as $localisation): ?>
            L.marker([<?php echo $localisation['latitude']; ?>, <?php echo $localisation['longitude']; ?>])
                .addTo(map)
                .bindPopup("<?php echo $localisation['nom']; ?>");
        <?php endforeach; ?>
    </script>
        <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
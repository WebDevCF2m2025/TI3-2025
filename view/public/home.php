<?php
require_once "../model/localisationsModel.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte - API</title>
    <!-- CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- CSS de markerCluster -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
    <link rel="stylesheet" href="/public/css/public.css">
</head>

<body>
    <div id="center">

        <h1>Carte Interactive</h1>
        <h3>Parcours DB à Bruxelles</h3>
        <a href="./?page=login"> <button>Conextion à l'administration</button></a>

    </div>

    <div id="ContainerCarte">

        <div class="left-content">
            <div id="carte"></div>
            <div class="content">
            </div>
        </div>

        <div id="list">
            <h3>List des ponts</h3>
            <h5>clické</h5>
            <hr>
            <?php
            $localisations = selectAllFromLocalisations($db);

            ?>
            <?php foreach ($localisations as $loc): ?>
                <ul>
                    <li><?= $loc['nom'], " | ", $loc['adresse'], " -", $loc['codepostal'], " ", $loc['ville'], " | " ?> <a
                            href="">Photo</a>
                    </li>


                </ul>
            <?php endforeach; ?>


        </div>
    </div>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
        </script>
    <script>

        const localisations = <?= json_encode($localisations); ?>;


        let latitudeGrandPlace = 50.8467;
        let letitudeGrandPlace = 4.3525;

        let map = L.map("carte", {
            center: [latitudeGrandPlace, letitudeGrandPlace],
            zoom: 13,
        });
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        localisations.forEach(loc => {

            L.marker([loc.latitude, loc.longitude])
                .addTo(map)
                .bindPopup(
                    `<b>${loc.nom}</b><br>${loc.adresse}<br>${loc.codepostal} ${loc.ville}`
                );
        }
        );
    </script>


</body>

</html>
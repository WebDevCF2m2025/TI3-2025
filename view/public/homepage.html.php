<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte interactive | Accueil</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Carte interactive</h1>
<h2>Parcours BD à Bruxelles</h2>
<?php
if(isset($_SESSION['username'])):
?>
    <div>
        <a class="btn" href="./?pg=logout">Déconnexion de l'administration</a>
        <a class="btn" href="./?pg=admin">Aller sur la page de l'administration</a>
    </div>
<?php
else:
?>
    <a class="btn" href="./?pg=login">Connexion à l'administration</a>

<?php
endif;
?>

<div class="container">
    <!-- Carte -->
    <div id="map"></div>

    <!-- Liste des points -->
    <div id="points">
        <h2>Liste des points</h2>
        <p>Cliquez sur un élément dans la liste ci-dessous pour la situer sur la carte</p>
        <br>
        <hr>
        <br>
            <div class="point">
                <ul>
                    <?php foreach ($points as $idx => $point) : ?>
                        <li
                                class="goto-point"
                                data-lat="<?= $point['latitude'] ?>"
                                data-lng="<?= $point['longitude'] ?>"
                                data-idx="<?= $idx ?>"
                        >
                            <strong><?= $point['nom'] ?></strong> |
                            <?= $point['adresse'] ?> <?= $point['numero'] ?> -
                            <?= $point['codepostal'] ?> <?= $point['ville'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
    </div>
</div>

<!-- Script Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="">
</script>
<script>
    const map = L.map('map').setView([50.8603396, 4.3557103], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    // Marqueurs synchronisés avec la liste
    const markers = [];
    <?php foreach ($points as $idx => $point) : ?>
    const marker<?= $idx ?> = L.marker([<?= $point['latitude'] ?>, <?= $point['longitude'] ?>])
        .addTo(map)
        .bindPopup(`<strong><?= addslashes(htmlspecialchars($point['nom'])) ?></strong><br><?= addslashes(htmlspecialchars($point['adresse'])) ?> <?= addslashes(htmlspecialchars($point['numero'])) ?><br><?= addslashes(htmlspecialchars($point['codepostal'])) ?> <?= addslashes(htmlspecialchars($point['ville'])) ?>`);
    marker<?= $idx ?>.on('click', function () {
        map.flyTo([<?= $point['latitude'] ?>, <?= $point['longitude'] ?>], 15);
    });
    markers.push(marker<?= $idx ?>);
    <?php endforeach; ?>

    // Ajout de l'interactivité sur la liste
    document.querySelectorAll('.goto-point').forEach((li, idx) => {
        li.addEventListener('click', function(){
            const lat = parseFloat(this.dataset.lat);
            const lng = parseFloat(this.dataset.lng);
            map.flyTo([lat, lng], 15);
            markers[idx].openPopup();
        });
    });
</script>
</body>
</html>
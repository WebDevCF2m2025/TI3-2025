<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/homepage.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1>Carte interactive<img class="loc" src="img/icons8-location-50.png"></h1>
        <h2>Les stations cambio</h2>
        <div class="button">
            <a href="./?pg=connexion">Connexion à l'administration<img class="fleche" src="img/icons8-droit-3-48.png"></a>
        </div>
    </div>
    <div class="containeur">
        <div id="carte"></div>
        <div class="liste">
            <div class="headerlist">
                <h2>Liste des points</h2>
                <p>Cliquez sur un élément ci-dessous pour le situer sur la carte</p>
                <br>
            </div>
            <div>
                <ul class="li">
                    <?php foreach ($localisations as $article): ?>
                        <li><?= $article['nom'] ?> | <?= $article['adresse'] ?> <?= $article['numero'] ?> - <?= $article['codepostal'] ?> <?= $article['ville'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <footer class="footer">
        © <?= date('Y') ?> TI3-2025 — Carte interactive | Réalisé par votre équipe
    </footer>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script src="js/homepage.js"></script>

</body>

</html>
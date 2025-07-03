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
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-dark">
<h1 class="text-brand">Carte interactive | Accueil</h1>
<h2 class="text-secondary">Les stations Cambio à Bruxelles</h2>

<?php if(isset($_SESSION['username'])): ?>
    <div class="actions-bar">
        <a class="btn btn-outline" href="./?pg=logout">Déconnexion de l'administration</a>
        <a class="btn btn-outline" href="./?pg=admin">Aller sur la page de l'administration</a>
    </div>
<?php else: ?>
    <div class="actions-bar">
        <a class="btn btn-primary" href="./?pg=login">Connexion à l'administration</a>
    </div>
<?php endif; ?>

<div class="container">
    <!-- Carte -->
    <div id="map" class="card"></div>

    <!-- Liste des points -->
    <div id="points" class="card">
        <h2 class="text-secondary">Liste des points</h2>
        <p class="muted">Cliquez sur un élément dans la liste ci-dessous pour le situer sur la carte</p>
        <hr>
        <div class="point">
            <ul id="loc-list"></ul>
        </div>
    </div>
</div>

<!-- Script Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="">
</script>
<script src="js/script.js"></script>
</body>
</html>
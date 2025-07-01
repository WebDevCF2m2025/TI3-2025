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
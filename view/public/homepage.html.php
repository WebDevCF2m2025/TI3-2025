<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte interactive - Parkings Bruxelles</title>
    <!-- CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- CSS de markerCluster -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
    <link rel="stylesheet" href="/css/style.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
/>
</head>
<body>
    <header>
        <h1>Carte interactive </h1>
        <h2>Parcours BD à Bruxelles</h2>
        <?php
        if(isset($_SESSION['idutilisateurs'])):
        ?>
        <a href="./?pg=disconnect" class="admin-link">Déconnexion de l'administration</a>
        <?php
        else:
        ?>
        <a href="./?pg=login" class="admin-link">Connexion à l'administration</a>
        <?php
        endif;
        ?>
    </header>
 
    <div class="container">
        <div class="grid-container">
            <div class="map-container">
                <div id="map"></div>
            </div>
            <div class="list-container">
                
                <h3>Liste des points</h3>
                <h5>Cliquez sur un élément dans la liste ci-dessous pour le situer sur la carte</h5>
                <ul class="point-list" id="pointList">
                    <div class="loading">Chargement des parkings...</div>
                </ul>
            </div>
        </div>
    </div>
 
    <!-- JS de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- JS de markerCluster -->
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    
    <script src="/js/script.js"></script>
    
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ti3</title>
<!-- CSS de Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<!-- CSS de markerCluster -->
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
<!-- Ma CSS -->
<style>
body {
    position: relative;
    z-index: 0;
  
}


body::before {
    content: "";
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background-image: url("TechnoD2.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    opacity: 0.2; /* ajuste ici l’opacité (0 = transparent, 1 = opaque) */
    z-index: -1;
    pointer-events: none;
}
       #carte {
           width: 800px;
           height:600px;
           margin: 0 auto;
       }
       h1{
           text-align: center;
       }
       h2{
           text-align: center;
           margin-top: 1rem;
       }
       .btn{
           width: 10rem ;
           margin: 0 auto;
           margin-bottom: 1rem;
       }
       .view{
           display: flex;
              flex-direction: column;
           border: solid 1px black;
       }
       .liste{
           border: solid 1px black;
           width: 100%;
       }
         #loginForm {
           display: none;
           margin-top: 20px;
       }
       .cart{
        width: 100%;
       }

       .liste {
    border: solid 1px black;
    height: 600px;      /* hauteur fixe */
    overflow-y: scroll; /* active le scroll vertical */
}

@media (min-width: 639px) {
  .view {
    display: flex;
     flex-direction: row;
  }
   .cart{
        width: 50%;
       }
       .liste {
        width: 50%;
       }

}
.navv {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
}


</style>
</head>
<body>
    
<h1>Carte interactive</h1>
<h2>Parcours BD à Bruxelles</h2>
<div class="navv">
                    <?php
                    include "_menu.html.php";
                    ?> 
    </div>
        

<div class="view">
<div class="cart" id="carte"></div>
<div class="liste">
<ul>
<?php foreach($localisations as $local) :  ?>
<li class="adresse-item"
    data-lat="<?= $local['latitude'] ?>"
    data-lng="<?= $local['longitude'] ?>">
    <?= $local['rue'] ?> | <?= $local['codepostal'] ?> | <?= $local['ville'] ?>
</li>
<br>
<hr>
<?php endforeach;  ?>
</ul>
</div>

</div>

<!-- JS de Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<!-- JS de markerCluster -->
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
<!-- Mon JS -->
<script>
       /* Définir le centre de la carte et le zoom */
       let map = L.map('carte', { center: [50.84,4.23], zoom: 12 });
       /* Définir le fond de carte */
       L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
           maxZoom: 20,
           attribution: '&copy; OpenStreetMap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(map);
       function testfetch() {
           fetch('./?json')
           .then(response => {
           if (!response.ok) {
               throw new Error('Erreur de réseau');
           }
           return response.json();
           })
           .then(data => {
               console.log(data);
               // tableau contient l'ensemble des données

               // Création d'un tableau avec les différentes positions
               let marqueurPositions = [];
               // Création d'un ClusterGroup
               let markers = L.markerClusterGroup();
               // On passe en revue tous les éléments du tableau
               data.forEach((item, index) => {
                   let rue = item.rue;
                   let codepostal = item.codepostal;
                   let ville = item.ville;
                   let latitude = parseFloat(item.latitude);
                   let longitude = parseFloat(item.longitude);
                   if (!isNaN(latitude) && !isNaN(longitude)) {
                       let marqueur = L.marker([latitude,longitude])
                           .bindPopup(`<h3>${rue}</h3><p>${codepostal}</p><p>${ville}</p>`);
                       marqueurPositions.push([latitude, longitude]);
                       markers.addLayer(marqueur);
                   }
               });
               // Calculer les limites de la carte et ajuster la vue
               if (marqueurPositions.length > 0) {
                   let limites = L.latLngBounds(marqueurPositions);
                   map.fitBounds(limites);
               }
               // Ajouter le clusterGroup à la carte
               map.addLayer(markers);
           })
           .catch(error => {
               console.error('Erreur:', error);
           });
       }
       testfetch();

       // Fonction pour activer le flyTo sur clic d'une adresse
       function setupFlyToOnList(map) {
           document.querySelectorAll('.adresse-item').forEach(function(item) {
               item.addEventListener('click', function() {
                   const lat = parseFloat(this.getAttribute('data-lat'));
                   const lng = parseFloat(this.getAttribute('data-lng'));
                   if (!isNaN(lat) && !isNaN(lng)) {
                       map.flyTo([lat, lng], 18, { animate: true, duration: 1.5 });
                   }
               });
           });
       }
       // Appelle la fonction après le chargement du DOM
       document.addEventListener('DOMContentLoaded', function() {
           setupFlyToOnList(map);
       });
</script>
</body>
</html>
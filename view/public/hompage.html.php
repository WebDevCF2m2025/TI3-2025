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
        #carte {
            width: 800px;
            height:600px;
            margin: auto;
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

    </style>
 
</head>
<body>
    <h1>Carte interactive</h1>
    <h2>Parcours BD à Bruxelles</h2>
    <div class="btn"><button onclick="testfetch()">Connexion admin</button></div>
    
    <div class="view"> 
         <div id="carte"></div>
         <div class="liste">
            <?php foreach($localisations as $local) :  
            ?>
            <ul>
                <li><?= $local['rue'] ?> | <?= $local['codepostal'] ?> <?= $local['ville'] ?> <a href="">Cliquer</a></li>
            </ul>
             <?php endforeach;  
            ?>
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
            fetch('https://opendata.brussels.be/api/explore/v2.1/catalog/datasets/bruxelles_parkings_publics/records?limit=20')
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
                tableau.forEach((item, index) => {
                    let nom = item.name_fr;
                    let latitude = item.geo_point_2d.lat;
                    let longitude = item.geo_point_2d.lon;
                    let adresse = item.adressee;
                
 
                    let marqueur = L.marker([latitude,longitude])
                        .bindPopup(`<h3>${nom}</h3><p>${adresse}</p><strong>${capacite}</strong>`);
                    //marqueur.addTo(map);
 
                    // Ajouter chaque position à mon tableau
                    marqueurPositions.push([latitude, longitude]);
 
                    // Ajouter chaque marqueur à mon clusterGroup
                    markers.addLayer(marqueur);
                });
 
                // Calculer les limites de la carte et ajuster la vue
                let limites = L.latLngBounds(marqueurPositions);
                map.fitBounds(limites);
 
                // Ajouter le clusterGroup à la carte
                map.addLayer(markers);
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        }
    </script>
</body>
</html>
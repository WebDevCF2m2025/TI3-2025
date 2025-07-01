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
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
 
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }
 
        
        header {
            text-align: center;
            padding: 2rem 1rem;
            background-color: black;
            color: white;
            margin-bottom: 1.5rem;
        }
 
        h1 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
 
        h2 {
            font-size: 1.4rem;
            font-weight: normal;
            color: #ecf0f1;
            margin-bottom: 1.5rem;
        }
 
        .admin-link {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 1rem;
        }
 
        .admin-link:hover {
            background-color: #2980b9;
        }
 
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
 
     
        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
 
        @media (min-width: 641px) {
            .grid-container {
                grid-template-columns: 1fr 1fr;
            }
        }
 
      
        .map-container, .list-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 500px;
        }
 
        #map {
            width: 100%;
            height: 100%;
        }
 
        .list-container {
            padding: 1.5rem;
            overflow-y: auto;
        }
 
        .list-container h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
            color: #2c3e50;
            position: sticky;
            top: 0;
            background-color: white;
        }
 
        .point-list {
            list-style-type: none;
        }
 
        .point-list li {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: background-color 0.2s;
        }
 
        .point-list li:hover {
            background-color: #f8f9fa;
        }
 
        .point-list li:last-child {
            border-bottom: none;
        }
 
        .point-name {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 0.3rem;
        }
 
        .point-address {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
 
        
        .loading, .error {
            text-align: center;
            padding: 2rem;
        }
 
        .loading {
            font-style: italic;
            color: #7f8c8d;
        }
 
        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <header>
        <h1>Carte interactive </h1>
        <h2>Parcours BD à Bruxelles</h2>
        <a href="./?pg=login" class="admin-link">Connexion à l'administration</a>
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
 
    <script>
        /* Définir le centre de la carte et le zoom */
        let map = L.map('map', { center: [50.84,4.23], zoom: 12 });
       
        /* Définir le fond de carte */
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; OpenStreetMap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
 
        // Création du groupe de marqueurs
        const markers = L.markerClusterGroup();
        map.addLayer(markers);
 
        // Fonction pour charger les données au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            loadParkings();
        });
 
        function loadParkings() {
            fetch('http://ti3-2025/?json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur de réseau');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                const pointList = document.getElementById('pointList');
                pointList.innerHTML = '';
               
                
 
              
 
                // Création d'un tableau avec les différentes positions
                let marqueurPositions = [];
 
                // On passe en revue tous les éléments du tableau
                data.forEach((item, index) => {
                    let nom = item.nom || "Nom inconnu";
                    let latitude = item.latitude;
                    let longitude = item.longitude;
                    let adresse = item.adresse ;
                    let codepostal = item.codepostal ;
                    let ville = item.ville ;
 
                    if (!latitude || !longitude) {
                        console.warn('Coordonnées manquantes pour:', nom);
                        return;
                    }
 
                    let marqueur = L.marker([latitude,longitude])
                        .bindPopup(`<h3>${nom}</h3><p>${adresse}</p><p>Places: </p>`);
 
                    // Ajouter chaque position à mon tableau
                    marqueurPositions.push([latitude, longitude]);
 
                    // Ajouter chaque marqueur à mon clusterGroup
                    markers.addLayer(marqueur);
 
                    // Ajouter à la liste
                    const li = document.createElement('li');
                    li.innerHTML = `
                       - ${nom} | ${adresse} - ${codepostal} ${ville}
                        
                    `;
                   
                    // Bonus: interaction liste -> carte
                    li.addEventListener('click', () => {
                        map.flyTo([latitude, longitude], 16);
                        marqueur.openPopup();
                    });
                   
                    pointList.appendChild(li);
                });
 
                // Calculer les limites de la carte et ajuster la vue
                if (marqueurPositions.length > 0) {
                    let limites = L.latLngBounds(marqueurPositions);
                    map.fitBounds(limites);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                document.getElementById('pointList').innerHTML =
                    `<div class="error">Erreur lors du chargement: ${error.message}</div>`;
            });
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte interactive</title>
    <!-- CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- ma CSS -->
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <h1>Carte interactive</h1>
    <h3>Parcours BD à Bruxelles</h3>
    <button onclick="login()">Seconnecter</button>
    <div class="container">
      <div id="map"></div>  
      <div>        
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Latitude</th>
            <th>longitude</th>
        </tr>
        <?php 
            foreach ($locations as $loc):?>
        <tr>
                <?php foreach($loc as $val):?>
                    <td><?= $val ?></td>
                <?php endforeach;?>
        </tr>
            <?php endforeach;?>
    </table>
        
    </div>
      </div>
    </div>
    

    <!-- JS de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- mon JS -->
    <script>
        /* créer une variable map qui va s'afficher dans le conteneur dont l'id vaut carte */
        const map = L.map('map').setView([50.85045, 4.34834], 12);

        /* définir sur quelle position est centrée la carte */
        /* latitude, longitude ainsi que le zoom */
        

        /* choisir le fond de carte et l'ajouter à la carte */
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);    

        const locations = <?= $jlocations?>;
        locations.forEach(loc => {
            const popupContent = `
            <strong>${loc.nom}</strong><br>
        ${loc.adresse}<br>
        ${loc.codepostal}
            `;
            L.marker([loc.latitude, loc.longitude])
            .addTo(map)
            .bindPopup(popupContent);
        });
    </script>
</body>
</html>
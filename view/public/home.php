<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte interactive</title>
    <!-- CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <!-- ma CSS -->
    <link rel="stylesheet" href="css/styles.css">
        
</head>
<body>
    <h1 class="main-title">Carte interactive</h1>
    <h3 class="main-subtitle">Parcours BD à Bruxelles</h3>
    <a href="./?pg=username" class="btn">Se connecter</a>
    <div class="container ">
      <div id="map"></div>  
      <div class="table-zone ">        
        <table>
            <tr>                
                <th>Nom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Latitude</th>
                <th>longitude</th>
            </tr>
            <?php foreach ($locations as $location): ?>
                <tr>            
                    <td><?= htmlspecialchars($location['nom']) ?></td>
                    <td><?= htmlspecialchars($location['adresse']) ?></td>
                    <td><?= htmlspecialchars($location['codepostal']) ?></td>
                    <td><?= htmlspecialchars($location['latitude']) ?></td>
                    <td><?= htmlspecialchars($location['longitude']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>

    <!-- JS de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script>
        const map = L.map('map').setView([50.85045, 4.34834], 12);
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
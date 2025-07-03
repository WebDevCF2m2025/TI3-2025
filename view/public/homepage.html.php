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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    opacity: 0.2; *
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

.liste {
    opacity: 0.75;
}
.liste ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.liste li {
    padding: 0.5rem 1rem;
    transition: background 0.2s;
}
.liste li:nth-child(even) {
    background: #f2f2f2;
}
.liste li:nth-child(odd) {
    background: #fff;
}
.liste li:hover {
    background: #d1e7fd;
    cursor: pointer;
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

footer {
    text-align: center;
    padding: 1rem;

    position: relative;
    bottom: 0;
    width: 100%;
}


</style>
</head>
<body>
    
<h1>Carte interactive</h1>
<h2>Les bornes à Bruxelles</h2>
<div class="navv">
                    <?php
                    include "_menu.html.php";
                    ?> 
    </div>
        

<div class="view">
<div class="cart" id="carte"></div>
<div class="liste">
<ul>
<?php foreach($localisations as $index => $local) :  ?>
<li class="adresse-item"
    data-lat="<?= $local['latitude'] ?>"
    data-lng="<?= $local['longitude'] ?>"
    data-index="<?= $index ?>">
    <?= $local['rue'] ?> | <?= $local['codepostal'] ?> | <?= $local['ville'] ?> 
    <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($local['latitude']) ?>,<?= urlencode($local['longitude']) ?>" target="_blank" rel="noopener noreferrer">  (Voir une autre carte)</a>
</li>
<br>
<hr>
<?php endforeach;  ?>
</ul>
</div>

</div>

<footer>
<p>© 2025 - C'était compliqué mais heureusement qu'on a eu 2 jours! merci. <i class="fa-solid fa-heart"></i> Fait par <strong>Vahagn</strong></p>
<p>Distribué par <a target="_blank"   href="https://www.cf2m.be/home">CF2M</a></p>
</footer>

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
               // Tableau pour stocker les références des marqueurs
               let markerRefs = [];
               // On passe en revue tous les éléments du tableau
               data.forEach((item, index) => {
                   let rue = item.rue;
                   let codepostal = item.codepostal;
                   let ville = item.ville;
                   let latitude = parseFloat(item.latitude);
                   let longitude = parseFloat(item.longitude);
                   if (!isNaN(latitude) && !isNaN(longitude)) {
                       let marqueur = L.marker([latitude,longitude])
                           .bindPopup(
                               `<h3>${rue}</h3>
                                <p>${codepostal}</p>
                                <p>${ville}</p>
                                <a href=\"https://www.google.com/maps/@50.8137261,4.3492155,13z?entry=ttu&g_ep=EgoyMDI1MDYyNi4wIKXMDSoASAFQAw%3D%3D\" target=\"_blank\" rel=\"noopener noreferrer\">\nVoir plus\n</a>`
                           );
                       marqueurPositions.push([latitude, longitude]);
                       markers.addLayer(marqueur);
                       markerRefs[index] = marqueur;
                   }
               });
               // Calculer les limites de la carte et ajuster la vue
               if (marqueurPositions.length > 0) {
                   let limites = L.latLngBounds(marqueurPositions);
                   map.fitBounds(limites);
               }
               // Ajouter le clusterGroup à la carte
               map.addLayer(markers);
               // Appeler la fonction de setup avec les références de marqueurs
               setupFlyToOnList(map, markerRefs);
           })
           .catch(error => {
               console.error('Erreur:', error);
           });
       }
       testfetch();

       // Fonction pour activer le flyTo sur clic d'une adresse
       function setupFlyToOnList(map, markerRefs) {
           document.querySelectorAll('.adresse-item').forEach(function(item) {
               item.addEventListener('click', function() {
                   const lat = parseFloat(this.getAttribute('data-lat'));
                   const lng = parseFloat(this.getAttribute('data-lng'));
                   const index = parseInt(this.getAttribute('data-index'));
                   if (!isNaN(lat) && !isNaN(lng)) {
                       map.flyTo([lat, lng], 18, { animate: true, duration: 1.5 });
                       if (markerRefs[index]) {
                           setTimeout(() => {
                               markerRefs[index].openPopup();
                           }, 1500); // attend la fin de l'animation flyTo
                       }
                   }
               });
           });
       }

</script>
</body>
</html>
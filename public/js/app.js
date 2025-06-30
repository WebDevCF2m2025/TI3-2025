/* créer une variable map qui va s'afficher dans le conteneur dont l'id vaut carte */
let carte = L.map('carte');

/* définir sur quelle position est centrée la carte */
/* latitude, longitude ainsi que le zoom */
carte.setView([50.825540, 4.338905], 14);

/* choisir le fond de carte et l'ajouter à la carte */
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);

/* Ajouter un panneau de contrôle qui indique l'échelle de la carte */
L.control.scale({
    position: "bottomleft",
    maxWidth:200,
    metric:true,
    imperial:false
}).addTo(carte);

const geocoderControl = new L.Control.Geocoder().addTo(carte);

const icone = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/128/2776/2776067.png',
    iconSize: [64, 64],
    iconAnchor: [32, 64],
    popupAnchor: [0, -64],
});

/* Ajouter un marqueur déplaçable */
let marqueurDeplacable = L.marker(carte.getCenter(), {draggable:true, icon:icone}).addTo(carte);

/* A la fin du déplacement du marqueur, on détecte les nouvelles caractéristiques */
marqueurDeplacable.on('dragend', function(e){
    console.log(e);
    /* récupérer les coordonnées de l'endroit où on a laché le marqueur */
    let nouvellePosition = L.latLng(e.target._latlng);

    /* transmettre la position */
    let adresse = trouverAdresse(nouvellePosition);

});

function trouverAdresse(position) {
    console.log(position);

    let latitude = position.lat;
    let longitude = position.lng;

    fetch(`https://nominatim.openstreetmap.org/reverse.php?format=jsonv2&lat=${latitude}&lon=${longitude}&zoom=18`)
        .then(response => response.json())
        .then(response => {
            console.log(response);
            console.log(response.display_name);

            /* ajouter un popup pour indiquer cette position */
            marqueurDeplacable.bindPopup(`<p>lat:${latitude}<br>lng:${longitude}</p><p>${response.display_name}</p>`);

            document.getElementById("adresse").innerHTML = response.display_name;
        })
        .catch(error => {
            console.log(error);
        });

}
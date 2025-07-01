/* créer une variable map qui va s'afficher dans le conteneur dont l'id vaut carte */
let carte = L.map('carte');

/* définir sur quelle position est centrée la carte */
/* latitude, longitude ainsi que le zoom */
carte.setView([50.8467139,4.3525151], 14);

/* choisir le fond de carte et l'ajouter à la carte */
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);


const loc = [
    { adresse: "79, Rue Joseph II", latitude: 50.845093, longitude: 4.375393 },
    { adresse: "168, Avenue de Cortenbergh", latitude: 50.845871, longitude: 4.391087 },
    { adresse: "48, Rue Montagne aux Herbes Potagères", latitude: 50.849990, longitude: 4.357120 },
    { adresse: "200, Avenue Louise", latitude: 50.827245, longitude: 4.364370 },
    { adresse: "432, Avenue Louise", latitude: 50.818626, longitude: 4.371465 },
    { adresse: "13, Rue du Pépin", latitude: 50.839737, longitude: 4.359362 },
    { adresse: "117, Rue Claessens", latitude: 50.870830, longitude: 4.352672 },
    { adresse: "212, Avenue Franklin Roosevelt", latitude: 50.801371, longitude: 4.390612 },
    { adresse: "17, Place Rouppe", latitude: 50.842531, longitude: 4.346140 },
    { adresse: "39, Rue Saint-Christophe", latitude: 50.847437, longitude: 4.345834 },
    { adresse: "2, Avenue de l'Uruguay", latitude: 50.799390, longitude: 4.392912 },
    { adresse: "42, Rue de l'Industrie", latitude: 50.843510, longitude: 4.370544 },
    { adresse: "130B, Avenue de Madrid", latitude: 50.898943, longitude: 4.346831 },
    { adresse: "430, Avenue Louise", latitude: 50.818722, longitude: 4.371369 },
    { adresse: "22, Rue du Grand Hospice", latitude: 50.853298, longitude: 4.349407 },
    { adresse: "100, Rue Franklin", latitude: 50.845966, longitude: 4.388259 },
    { adresse: "7A, Avenue de l'Héliport", latitude: 50.858354, longitude: 4.351051 },
    { adresse: "6, Rue Ducale", latitude: 50.847396, longitude: 4.367323 },
    { adresse: "34, Boulevard d'Anvers", latitude: 50.857278, longitude: 4.350685 },
    { adresse: "63, Rue Franklin", latitude: 50.845234, longitude: 4.386614 },
    { adresse: "48, Quai du Commerce", latitude: 50.857133, longitude: 4.348298 },
    { adresse: "33, Quai au Bois à Brûler", latitude: 50.852184, longitude: 4.348112 },
    { adresse: "1, Rue Stevin", latitude: 50.846055, longitude: 4.374765 },
    { adresse: "18, Rue Guimard", latitude: 50.843826, longitude: 4.370679 },
    { adresse: "29, Quai au Bois à Brûler", latitude: 50.852138, longitude: 4.348198 },
    { adresse: "100, Rue Belliard", latitude: 50.843467, longitude: 4.375581 },
    { adresse: "Rue de la Loi 223", latitude: 50.844365, longitude: 4.390391 },
    { adresse: "Av. de la Renaissance 9", latitude: 50.841315, longitude: 4.393732 },
    { adresse: "Rue Boduognat 9", latitude: 50.844139, longitude: 4.378838 },
    { adresse: "Place Jean Rey", latitude: 50.839607, longitude: 4.379297 },
    { adresse: "Rue Van Maerlant 2", latitude: 50.842738, longitude: 4.374517 },
    { adresse: "Rue de Trèves 37", latitude: 50.838914, longitude: 4.375820 },
    { adresse: "Rue de Pascale 76", latitude: 50.837536, longitude: 4.377997 },
    { adresse: "Rue du Luxembourg 3", latitude: 50.838550, longitude: 4.374231 },
    { adresse: "Rue de la Loi 42", latitude: 50.846001, longitude: 4.365586 },
    { adresse: "Rue de la Presse 10", latitude: 50.848343, longitude: 4.368349 },
    { adresse: "Rue Montoyer 100", latitude: 50.842173, longitude: 4.365221 },
    { adresse: "Rue des Sols 8", latitude: 50.845730, longitude: 4.357019 },
    { adresse: "Rue du Marché aux Herbes 120", latitude: 50.847430, longitude: 4.355288 },
    { adresse: "Rue des Colonies 56", latitude: 50.846768, longitude: 4.359977 },
    { adresse: "Rue des Petits Carmes 20", latitude: 50.843232, longitude: 4.361174 },
    { adresse: "Boulevard de l'Empereur 1", latitude: 50.845213, longitude: 4.357295 },
    { adresse: "Place des Palais 2", latitude: 50.844703, longitude: 4.363983 },
    { adresse: "Rue Royale 180", latitude: 50.854232, longitude: 4.365762 }
];




loc.forEach(loc => {
    L.marker([loc.latitude, loc.longitude])
        .addTo(carte)
        .bindPopup(loc.nom);
});

/* Ajouter un panneau de contrôle qui indique l'échelle de la carte */
/*L.control.scale({
    position: "bottomleft",
    maxWidth:200,
    metric:true,
    imperial:false
}).addTo(carte);*/

/*const geocoderControl = new L.Control.Geocoder().addTo(carte);

const icone = L.icon({
    iconUrl: '../img/pin.png',
    iconSize: [64, 64],
    iconAnchor: [32, 64],
    popupAnchor: [0, -64],
});*/

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
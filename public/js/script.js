




// Script pour la carte Leaflet


// Initialisation de la carte
let map = L.map('map').setView([51.5, -0.09], 14); // Coordonnées de Paris

// Chargement de la couche de tuiles OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Ajout d'un marqueur
var marker = L.marker([51.5, -0.09]).addTo(map);



// Ajout de popups aux éléments

marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

var popup = L.popup();



map.on('click', function(e){
  var marker = new L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
  marker.bindPopup("<b>New Marker!</b><br>Coordinates: " + e.latlng.toString()).openPopup();
});
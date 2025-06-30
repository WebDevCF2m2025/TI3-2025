




// Script pour la carte Leaflet






// Initialisation de la carte
let map = L.map('map').setView([50.8301436 , 4.3402184], 13); // Coordonnées de Paris

// Chargement de la couche de tuiles OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);




// zoom on click
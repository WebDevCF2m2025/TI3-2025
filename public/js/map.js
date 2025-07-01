/* Définir le centre de la carte et le zoom */
let map = L.map('carte', { center: [50.84, 4.23], zoom: 18 });


L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '&copy; OpenStreetMap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


const markers = L.markerClusterGroup();
map.addLayer(markers);


document.addEventListener('DOMContentLoaded', function () {
    loadParkings();
});

function loadParkings() {
    fetch('https://2025.webdev-cf2m.be/omer/TI-3/public/?json')
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
                let adresse = item.adresse || "Adresse non disponible";


                if (!latitude || !longitude) {
                    console.warn('Coordonnées manquantes pour:', nom);
                    return;
                }

                let marqueur = L.marker([latitude, longitude])
                    .bindPopup(`<h3>${nom}</h3><p>${adresse}</p><p>Places: </p>`);

                // Ajouter chaque position à mon tableau
                marqueurPositions.push([latitude, longitude]);

                // Ajouter chaque marqueur à mon clusterGroup
                markers.addLayer(marqueur);

                // Ajouter à la liste
                const li = document.createElement('li');
                li.innerHTML = `
                        <div class="point-name">${nom}</div>
                        <div class="point-address">${adresse}</div>
                       
                    `;

                // Bonus: interaction liste -> carte
                li.addEventListener('click', () => {
                    map.flyTo([latitude, longitude], 18);
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
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
 
                    
 
                    let marqueur = L.marker([latitude,longitude])
                        .bindPopup(`<h3>${nom}</h3><p>${adresse} -${codepostal} ${ville} </p>`);
 
                    // Ajouter chaque position à mon tableau
                    marqueurPositions.push([latitude, longitude]);
 
                    // Ajouter chaque marqueur à mon clusterGroup
                    markers.addLayer(marqueur);
 
                    // Ajouter à la liste
                    const li = document.createElement('li');
                    li.innerHTML = `
                    <i class="fas fa-paper-plane"></i> ${nom} | ${adresse} - ${codepostal} ${ville}
                        
                    `;
                   
                    // interaction liste -> carte
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
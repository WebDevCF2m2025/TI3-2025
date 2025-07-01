let map = L.map('carte').setView([50.8503, 4.3517], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const monIcon = L.icon({
            iconUrl: 'img/map-marker-icon_34392.png', // Mets le chemin de ton image ici
            iconSize: [38, 38], // taille de l'icône
            iconAnchor: [19, 38], // point de l'icône qui correspond à la position du marqueur
            popupAnchor: [0, -38] // point d'où la popup s'ouvre relativement à l'iconAnchor
        });

        fetch('./?pg=json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur de réseau');
                }
                return response.json();
            })
            .then(data => {
                let marqueurs = [];
                let marqueurPositions = [];
                let markers = L.markerClusterGroup();

                data.forEach((item, index) => {
                    let nom = item.nom;
                    let adresse = item.adresse;
                    let ville = item.ville;
                    let numero = item.numero;
                    let codepostal = item.codepostal;
                    let latitude = item.latitude;
                    let longitude = item.longitude;

                    let marqueur = L.marker([latitude, longitude], {
                            icon: monIcon
                        })
                        .bindPopup(`<h3 style="text-align:center;font-family: 'Poppins', Arial, sans-serif;">${nom}</h3><p style="font-family: 'Poppins', Arial, sans-serif;"><span style="font-weight: bold";>Adresse</span>: ${numero} ${adresse} ${codepostal} ${ville}</p>`);

                    marqueurs.push(marqueur);
                    marqueurPositions.push([latitude, longitude]);
                    markers.addLayer(marqueur);
                });

                let limites = L.latLngBounds(marqueurPositions);
                map.fitBounds(limites);
                map.addLayer(markers);

                // Associer chaque li à son marqueur
                document.querySelectorAll('.li li').forEach((li, index) => {
                    li.addEventListener('click', function() {
                        let marqueur = marqueurs[index];
                        map.flyTo(marqueur.getLatLng(), 18);
                        marqueur.openPopup();
                    });
                });
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
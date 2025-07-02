

const map = L.map('map').setView([50.8603396, 4.3557103], 12);
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', { attribution: '&copy; OpenStreetMap' }).addTo(map);

const markers = [];
const list = document.getElementById('loc-list'); // Liste HTML

fetch('./index.php?json')
    .then(response => response.json())
    .then(points => {
        list.innerHTML = '';
        points.forEach((point, idx) => {
            // Création du marqueur sur la carte
            const marker = L.marker([point.latitude, point.longitude])
                .addTo(map)
                .bindPopup(
                    `<strong>${point.nom.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</strong><br>
          ${point.adresse.replace(/</g, '&lt;').replace(/>/g, '&gt;')} ${point.numero}<br>
          ${point.codepostal} ${point.ville.replace(/</g, '&lt;').replace(/>/g, '&gt;')}`
                );
            marker.on('click', () => {
                map.flyTo([point.latitude, point.longitude], 15);
            });
            markers.push(marker);

            // Création de l'item dans la liste
            const li = document.createElement('li');
            li.className = 'goto-point list-group-item';
            li.dataset.lat = point.latitude;
            li.dataset.lng = point.longitude;
            li.style.cursor = 'pointer';
            li.innerHTML = `<strong>${point.nom.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</strong> — ${point.adresse} ${point.numero}, ${point.ville}`;
            li.addEventListener('click', function(){
                // Retirer classe active des autres
                document.querySelectorAll('#loc-list .active').forEach(el => el.classList.remove('active'));
                this.classList.add('active');
                map.flyTo([parseFloat(this.dataset.lat), parseFloat(this.dataset.lng)], 15);
                markers[idx].openPopup();
            });

            list.appendChild(li);
        });
        // Ajuste la vue de la carte si plusieurs markers
        if(points.length){
            const group = new L.featureGroup(markers);
            map.fitBounds(group.getBounds().pad(0.2));
        }
    })
    .catch(error => {
        alert("Impossible de charger les localisations");
        console.error(error);
    });


let map = L.map('map').setView([50.8301436, 4.3402184], 13);

var Thunderforest_SpinalMap = L.tileLayer('https://{s}.tile.thunderforest.com/spinal-map/{z}/{x}/{y}{r}.png?apikey={apikey}', {
  attribution: '&copy; <a href="http://www.thunderforest.com/">Thunderforest</a>, &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  apikey: 'd4bf4b9119c54964bac529246362d8b4',
  maxZoom: 22
}).addTo(map);

const markers = [];
const list = document.getElementById('loc-list'); // Liste HTML

fetch('./index.php?getjson')
  .then(response => response.json())
  .then(points => {
    list.innerHTML = '';
    points.forEach((point, idx) => {
      // Création du marqueur sur la carte
      const marker = L.marker([point.latitude, point.longitude])
        .addTo(map)
        .bindPopup(
          `<strong>${point.nom.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</strong>

          ${point.adresse.replace(/</g, '&lt;').replace(/>/g, '&gt;')} ${point.numero}

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
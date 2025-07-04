
                    
let carte = L.map('carte');

carte.setView([ 50.847205, 4.35068], 12
);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);



fetch('./?listjs')
  .then(response => response.json())
  .then(points => {
    listes.innerHTML = '';
    points.forEach((point, idx) => {
      // Création du marqueur sur la carte
      const marker = L.marker([point.latitude, point.longitude])
        .addTo(carte)
        .bindPopup(
          `<strong>${point.nom.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</strong>

          ${point.adresse.replace(/</g, '&lt;').replace(/>/g, '&gt;')} ${point.numero}

          ${point.codepostal} ${point.ville.replace(/</g, '&lt;').replace(/>/g, '&gt;')}`
        );
      marker.on('click', () => {
        carte.flyTo([point.latitude, point.longitude], 15);
      });
      markers.push(marker);

      // Création de l'item dans la liste
      const li = document.createElement('li');
      li.className = 'goto-point list-group-item';
      li.dataset.lat = point.latitude;
      li.dataset.lng = point.longitude;
      li.style.cursor = 'pointer';
      li.innerHTML = `<strong>${point.nom.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</strong> — ${point.adresse}`;
      li.addEventListener('click', function(){
        // Retirer classe active des autres
        document.querySelectorAll('carte .active').forEach(el => el.classList.remove('active'));
        this.classList.add('active');
        carte.flyTo([parseFloat(this.dataset.lat), parseFloat(this.dataset.lng)], 15);
        markers[idx].openPopup();
      });

      list.appendChild(li);
    });
    // Ajuste la vue de la carte si plusieurs markers
    if(points.length){
      const group = new L.featureGroup(markers);
      carte.fitBounds(group.getBounds().pad(0.2));
    }
  })
 // .catch(error => {
 //   alert("Impossible de charger les localisations");
 //   console.error(error);
 // });







const markersArray = [];


locations.forEach((loc, index) => {
    const popupContent = `
    <strong>${loc.nom}</strong><br>
    ${loc.adresse}<br>
    ${loc.codepostal}
    `;
    const marker = L.marker([loc.latitude, loc.longitude])
    .addTo(map)
    .bindPopup(popupContent);
    
   
    marker.getElement().setAttribute('data-index', index);
    markersArray.push(marker);
});


document.querySelectorAll('.table-zone tbody tr').forEach((row, index) => {
    row.addEventListener('mouseenter', function() {
      
        if (markersArray[index]) {
            markersArray[index -1].getElement().classList.add('marker-highlighted');
        }
    });
    
    row.addEventListener('mouseleave', function() {
      
        if (markersArray[index]) {
            markersArray[index -1].getElement().classList.remove('marker-highlighted');
        }
    });
});

document.querySelectorAll('.location-row').forEach(row =>{
    row.addEventListener('click', function(){
        const lat = parseFloat(this.dataset.lat);
        const lng = parseFloat(this.dataset.lng);
        map.flyTo([lat, lng], 15,{
            animatr: true,
            duration: 3
        });
    });
});
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
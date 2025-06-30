function testFetch(){
    fetch("https://opendata.brussels.be/api/explore/v2.1/catalog/datasets/hopitaux-publics/records?limit=5")
    .then(response => response.json())
//    .then(response => console.log(JSON.stringify(response)))
    .then(response => {
        // récupérer la réponse à ma requête */
        console.log(response);

        // nombre de données
        console.log(response.total_count);
        // résultats
        let data = response.results;
        // pour chaque résultat,...
        data.forEach((item)=>{
            let latitude = item.geo_coordinates.lat;
            let longitude = item.geo_coordinates.lon;
            let nom = item.name_fr;

            // créer un marqueur
            const marqueur = L.marker([latitude, longitude]);
            // ajouter ce marqueur sur la carte
            marqueur.addTo(carte);
            // ajouter un popup associé au marqueur
            marqueur.bindPopup(`${nom}`);                       
        });
        
    })   
    .catch(error => alert("Erreur : " + error));

    


}
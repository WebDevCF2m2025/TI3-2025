
<p> SALUT </p>

const localisations = [
  { nom: 'Place Maurice Van Meenen', adresse: 'Place Maurice Van Meenen - 1060 Saint Gilles', latitude: 50.824993, longitude: 4.345397 },
  { nom: 'Mont des Arts - Bibliothèque Royale', adresse: "Boulevard de l'Empereur, 4 - 1000 Bruxelles", latitude: 50.843862, longitude: 4.356765 },
  { nom: 'Place Rogier', adresse: 'Place Rogier - 1210 Bruxelles', latitude: 50.855800, longitude: 4.358945 },
  { nom: 'Place De Brouckère', adresse: 'Place De Brouckère - 1000 Bruxelles', latitude: 50.851456, longitude: 4.352785 },
  { nom: 'Place Colignon', adresse: 'Place Colignon - 1030 Schaerbeek', latitude: 50.867029, longitude: 4.373310 },
  { nom: 'Place de la Bourse', adresse: 'Place de la Bourse - 1000 Bruxelles', latitude: 50.848609, longitude: 4.349734 },
  { nom: 'Place du Luxembourg', adresse: 'Place du Luxembourg - 1050 Bruxelles', latitude: 50.839102, longitude: 4.373078 },
  { nom: 'Place Saint Denis', adresse: 'Place Saint Denis - 1190 Forest', latitude: 50.809698, longitude: 4.316902 },
  { nom: 'Coudenberg', adresse: 'Koudenberg, 3 - 1000 Bruxelles', latitude: 50.843094, longitude: 4.358020 },
  { nom: 'Maison Communale - Evere / Gemeentehuis - Evere', adresse: 'Square Hoedemaekers 10 - 1140 Evere', latitude: 50.872601, longitude: 4.403192 },
  // … la suite des 38 localisations encore à ajouter
];

  localisations.forEach(loc => {
    L.marker([loc.latitude, loc.longitude])
      .addTo(carte)
      .bindPopup(loc.nom);
  });


    /* Définir un tableau de marqueurs */
let listeMarqueurs = [];

/* Utiliser une boucle pour lire le contenu de la liste */
liste.forEach(function(element,index){
    console.log(element);
    console.log(index);

    /* détails d'un élément */
    let nom = element.nom;
    let adresse = element.adresse + " " + element.code_postal + " " + element.commune;
    let site = element.lien_web;
    let latitude = element.coordonnees_geographiques.lat;
    let longitude = element.coordonnees_geographiques.lon;

    /* créer un marqueur pour chaque élément */
    let marqueur = L.marker([latitude,longitude]).addTo(map);
    /* Ajouter un popup à ce marqueur */
    marqueur.bindPopup(`<h2>${nom}</h2><p>${adresse}</p><a href="${site}" target="_blank">Site Web</a>`);

    /* Ajouter ce marqueur à mon tableau */
    listeMarqueurs.push(marqueur);
});

document.getElementById('commentaire').innerHTML = "Il y a actuellement dans ma liste : " + listeMarqueurs.length + " éléments.";

//console.log(listeMarqueurs);

/* Regrouper les marqueurs dans un groupe */
const groupe = new L.featureGroup(listeMarqueurs);

/* Adapter l'affichage de la carte aux limites du groupe */
map.fitBounds(groupe.getBounds());


    
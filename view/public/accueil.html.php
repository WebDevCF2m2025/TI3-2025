<?php
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ti3_2025_accueil</title>
        <link rel="icon" type="" href=""/>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />
        <style>
            #carte {
                width: 600px;
                height: 600px;
                border-radius: 3%;
                margin-left:50px;
            }
        </style>

    </head>
    <?php include "../view/_menu.html.php"; ?>

    <body>
                <div id="container1">
                    <h2>CARTE INTERACTIVE</h2>
                    <h4>Les bornes wifi publiques</h4>
                </div>

            <div id="general">

                <div id="carte"></div>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
            
                </script>
               


          

                 <!--  <script>

                    const localisations = [
                    { adresse: 'Place Maurice Van Meenen - 1060 Saint Gilles', latitude: 50.824993, longitude: 4.345397 },
                    { adresse: "Boulevard de l'Empereur, 4 - 1000 Bruxelles", latitude: 50.843862, longitude: 4.356765 },
                    { adresse: 'Place Rogier - 1210 Bruxelles', latitude: 50.855800, longitude: 4.358945 },
                    { adresse: 'Place De Brouckère - 1000 Bruxelles', latitude: 50.851456, longitude: 4.352785 },
                    { adresse: 'Place Colignon - 1030 Schaerbeek', latitude: 50.867029, longitude: 4.373310 },
                    { adresse: 'Place de la Bourse - 1000 Bruxelles', latitude: 50.848609, longitude: 4.349734 },
                    { adresse: 'Place du Luxembourg - 1050 Bruxelles', latitude: 50.839102, longitude: 4.373078 },
                    { adresse: 'Place Saint Denis - 1190 Forest', latitude: 50.809698, longitude: 4.316902 },
                    { adresse: 'Koudenberg, 3 - 1000 Bruxelles', latitude: 50.843094, longitude: 4.358020 },
                    { adresse: 'Square Hoedemaekers 10 - 1140 Evere', latitude: 50.872601, longitude: 4.403192 },
                    { adresse: 'Chaussée de Gand, 1129 - 1082 BSA', latitude: 50.864312, longitude: 4.296932 },
                    { adresse: 'Place Communale - 1080 Molenbeek', latitude: 50.854744, longitude: 4.338636 },
                    { adresse: 'Parvis de Saint Gilles - 1060 Saint Gilles', latitude: 50.830507, longitude: 4.345351 },
                    { adresse: 'Place du Jeu de Balle - 1000 Bruxelles', latitude: 50.837009, longitude: 4.345736 },
                    { adresse: 'Place Simon Bolivar - 1030 Schaerbeek', latitude: 50.860645, longitude: 4.358590 },
                    { adresse: 'Rue Roger Van der Weyden 3 - 1000 Bruxelles', latitude: 50.841889, longitude: 4.343493 },
                    { adresse: 'Place du Conseil, 1 - 1070 Anderlecht', latitude: 50.839053, longitude: 4.329663 },
                    { adresse: 'Avenue Salomé, 2', latitude: 50.830842, longitude: 4.455309 },
                    { adresse: "Place de l'Altitude Cent ( au-dessus du proxy Delhaize)", latitude: 50.816655, longitude: 4.336770 },
                    { adresse: 'Place de la Monnaie - 1000 Bruxelles', latitude: 50.850002, longitude: 4.353347 },
                    { adresse: 'Place Ferdinand Cocq - 1050 Ixelles', latitude: 50.833045, longitude: 4.366952 },
                    { adresse: 'Grand-Place', latitude: 50.846747, longitude: 4.352462 },
                    { adresse: 'Place Rouppe - 1000 Bruxelles', latitude: 50.842803, longitude: 4.345832 },
                    { adresse: 'Place Dumon, ?? - 1150 Woluwé Saint Pierre', latitude: 50.839945, longitude: 4.465015 },
                    { adresse: 'Parvis Sainte-Alix, 1150 Woluwé St Pierre', latitude: 50.827823, longitude: 4.462162 },
                    { adresse: 'Place Flagey - 1050 Ixelles', latitude: 50.827762, longitude: 4.372441 },
                    { adresse: 'Parc Elisabeth', latitude: 50.865263, longitude: 4.325386 },
                    { adresse: 'Rue du Lombard, 77 - 1000 Bruxelles', latitude: 50.844660, longitude: 4.352998 },
                    { adresse: 'Square Hoedemaekers 10 - 1140 Evere', latitude: 50.872024, longitude: 4.403433 },
                    { adresse: 'Croisement Rue Saint Marie et Rue du Compte de Flandre', latitude: 50.855635, longitude: 4.338896 },
                    { adresse: 'Rue Joseph Mertens, 15 - 1082 BSA', latitude: 50.864091, longitude: 4.292859 },
                    { adresse: 'Place Cardinal Mercier, 10 - 1090 Jette', latitude: 50.880399, longitude: 4.328213 },
                    { adresse: 'Maison Antoine, Place jourdan 1 - 1040 Etterbeek', latitude: 50.836824, longitude: 4.381443 },
                    { adresse: 'Quai des péniches, 16 - 1000 Bruxelles', latitude: 50.860510, longitude: 4.348487 },
                    { adresse: 'Square Prince Léopold', latitude: 50.883673, longitude: 4.341004 },
                    { adresse: 'Place Simonis', latitude: 50.863094, longitude: 4.330406 },
                    { adresse: 'Place Reine Paola 11, 1083 Ganshoren', latitude: 50.875087, longitude: 4.300563 },
                    { adresse: 'Place Roi Baudouin - 1082 BSA', latitude: 50.863323, longitude: 4.295852 },
                    { adresse: 'Place Sainte-Catherine', latitude: 50.850595, longitude: 4.347675 },
                    { adresse: 'Place de Londres 5,  1050 Ixelles', latitude: 50.837668, longitude: 4.368435 },
                    { adresse: "Parc de l'Abbaye - 1190 Forest", latitude: 50.810617, longitude: 4.316946 },
                    { adresse: 'Place Emile Bockstael', latitude: 50.877137, longitude: 4.347441 },
                    { adresse: 'Place Royale, 2 - 1000 Bruxelles', latitude: 50.842305, longitude: 4.359477 },
                    { adresse: 'Chemin du Rossignol 18-2°', latitude: 50.895585, longitude: 4.385503 },
                    { adresse: 'Place Saint Josse - 1210 Saint Josse', latitude: 50.849782, longitude: 4.374246 },
                    { adresse: 'Avenue Edmond Galoppin - 1150 WSP', latitude: 50.831469, longitude: 4.426945 },
                    { adresse: 'Place De Brouckère 41', latitude: 50.852100, longitude: 4.353410 }
                    ];


                    localisations.forEach(loc => {
                        L.marker([loc.latitude, loc.longitude])
                        .addTo(carte)
                        .bindPopup(loc.nom);
                    }); 
                  


                        /* Définir un tableau de marqueurs */
                    let listeMarqueurs = [];

                    /* Utiliser une boucle pour lire le contenu de la liste */
                    localisations.forEach(function(element,index){
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


                </script> -->
            </div>
        

            <div id="liste">
            
                <ul>
                <h3>Liste des localisations</h3>
                    <?php
                
                    foreach($listes as $liste):
                    ?>
                        <li>
                            <a><?php echo $liste['nom']. "| ". $liste['adresse']; ?></a>
                            <span id="lat">
                             <?php 

                            echo $liste["latitude"];
                           

                            
                            ?>
                            </span>

                            <span id="long">
                             <?php 

                          
                            echo $liste["longitude"];

                            
                            ?>
                            </span>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div> 
        <script src="js/carte.js"></script>  
 
    </body>

<html>

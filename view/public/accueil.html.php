<?php
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ti3_2025_accueil</title>
        <link rel="icon" type="" href=""/>
        <link rel="stylesheet" href="../../public/css/style.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <style>
            #carte {
                width: 800px;
                height: 600px;
                border: 1px solid black;
            }
        </style>

    </head>
    <body>
        <h1>Carte interactive</h1>
        <h2>Parcours BD à Bruxelles</h2>
        <div id="carte"></div>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
        </script>
        <script>

        let carte = L.map('carte');

        carte.setView([50.8215, 4.3315], 14);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);

        const marqueur = L.marker([50.8215, 4.3315]);

        marqueur.addTo(carte);

        marqueur.bindPopup('Je suis ici !').openPopup();
        </script>

        <div id="liste"></div>
        

    </body>

<html>

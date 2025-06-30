<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #20b8d8;
            color: white;
        }
        #carte {
            width: 50%;
            height: 800px;
            border-radius: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 5em;
        }

        #btn {
            padding: 1em;
        }

        .containeur {
            width: 80%;
            margin: 0 auto;
            display: flex;
            gap: 1em;
        }

        .liste {
            width: 50%;
        }

        .headerlist {
            text-align: center;
        }

        .headerlist p {
            border-bottom: 1px solid black;
            width: 90%;
            padding-bottom: 1em;
            margin: 0 auto;
        }

        .liste {
            height: 800px;
            overflow-y: auto;
        }

        .liste ul,
        .liste li {
            width: 100%;
            box-sizing: border-box;
        }

        a{
            text-decoration: none;
            color: white;
            position: relative;
        }

        .fleche{
            position: absolute;
            width: 25px;
            top:0px;
            left:230px;
        }

        h1{
            position: relative;
        }

        .loc{
            position:absolute;
            width: 40px;
        }

        .button{
            padding: 1em 2em 1em 1em;
            padding-right: 2em;
            border-radius: 20px;
            display: inline-block;
            background-color: #155496;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1>Carte interactive<img class="loc" src="img/icons8-location-50.png"></h1>
        <h2>Les stations cambio</h2>
        <div class="button">
            <a href="./?pg=connexion">Connexion à l'administration<img class="fleche" src="img/icons8-droit-3-48.png"></a>
        </div>
    </div>
    <div class="containeur">
        <div id="carte"></div>
        <div class="liste">
            <div class="headerlist">
                <h2>Liste des points</h2>
                <p>Cliquez sur un élement ci-dessous pour le situer sur la carte</p>
                <br>
            </div>
            <div>
                <?php
                foreach ($localisations as $article):
                ?>
                    <ul>
                        <li><?= $article['nom'] ?> | <?= $article['adresse'] ?> <?= $article['numero'] ?> - <?= $article['codepostal'] ?> <?= $article['ville'] ?></li>
                    </ul>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>




    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script>
        let map = L.map('carte').setView([50.8503, 4.3517], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

            fetch('./?pg=json')
            .then(response => {
            if (!response.ok) {
                throw new Error('Erreur de réseau');
            }
            return response.json();
            })
            .then(data => {
                console.log(data);

                let marqueurPositions = [];

                let markers = L.markerClusterGroup();

                data.forEach((item, index) => {
                    let nom = item.nom;
                    let adresse = item.adresse;
                    let ville = item.ville;
                    let codepostal = item.codepostal;
                    let numero = item.numero;
                    let latitude = item.latitude;
                    let longitude = item.longitude;

                    console.log(latitude,longitude);

                    let marqueur = L.marker([latitude,longitude])
                        .bindPopup(`<h3>${nom}</h3><p>${adresse}</p>`);

                    marqueurPositions.push([latitude, longitude]);

                    markers.addLayer(marqueur);
                });

                let limites = L.latLngBounds(marqueurPositions);
                map.fitBounds(limites);

                map.addLayer(markers);
            })
            .catch(error => {
                console.error('Erreur:', error);
            });

    </script>
</body>

</html>
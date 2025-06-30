<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <style>
        #carte {
            width: 50%;
            height: 800px;
        }

        .header {
            text-align: center;
            margin-bottom: 2em;
        }

        #btn {
            padding: 1em;
        }

        .containeur {
            width: 80%;
            margin: 0 auto;
            display: flex;
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
    </style>
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1>Carte interactive</h1>
        <h2>Les stations cambio</h2>
        <button id="btn">Connexion à l'administration</button>
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
                        <li><?= $article['nom'] ?> | <?= $article['adresse'] ?> <?= $article['numero'] ?> - <?= $article['codepostal'] ?> <?= $article['ville'] ?> <a href="">Cliquer</a></li>
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
    <script>
        let map = L.map('carte').setView([51.505, -0.09], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="css/style.css">
    <title>Mon site</title>

</head>

<body>
    <div class="main">

        <?php if (isset($_GET['page']) && $_GET['page'] === 'conn'): ?>
            <form id="connectForm" method="post">
                <div>
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div>
                    <button type="submit">Se connecter</button>
                    <a href="./" class="back-link">Revenir à la page d'accueil</a>
                    <span style="color: red; margin-top: 3px;"><?php if (isset($erreur)) {
                                                                    echo $erreur;
                                                                } ?></span>
                </div>
            </form>
        <?php else: ?>
            <h1>Carte interactive</h1>
            <h2>Thème de la carte</h2>
            <a id="adminBtn" href="?page=conn">Connexion à<br> l'administration</a>

            <div id="carteAndList">
                <div id="carte"></div>

                <div class="scrollable-list">
                    <div class="list-header">
                        <h2>Liste des points</h2>
                        <h3>Cliquez sur un élément dans la liste ci-dessous pour le situer sur la carte</h3>
                    </div>

                    <ul>
                        <?php foreach ($locations as $location): ?>
                            <li>
                                <?= htmlspecialchars($location['nom']) ?> |
                                <?= htmlspecialchars($location['adresse']) ?> -
                                <?= htmlspecialchars($location['codepostal']) ?> |
                                <a href="">Photo</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <script src="../../public/js/main.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Initialisation de la carte
        let map = L.map("carte", {
            center: [50.84, 4.35],
            zoom: 12
        });

        // Fond de carte OpenStreetMap
        L.tileLayer("https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png", {
            maxZoom: 20,
            attribution: '&copy; OpenStreetMap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        function testfetch() {
            fetch(
                    "https://api.openstreetmap.org/api/0.6/map?bbox=-0.489,-0.123,0.236,51.569"
                )
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Erreur de réseau");
                    }
                    return response.json();
                })
                .then((data) => {
                    // console.log(data);
                    // let tableau = data.results;
                    let marqueurPositions = [];

                    data.forEach((item) => {
                        let nom = item.title;
                        let latitude = item.latitude;
                        let longitude = item.longitude;
                        let adresse = item.slug;
                        // let lien = item.lien_web;

                        // Icône personnalisée
                        let myIcon = L.icon({
                            iconUrl: "../public/assets/1.png", // Assure-toi que ce fichier est bien dans le même dossier
                            iconSize: [30, 30],
                            iconAnchor: [22, 94],
                            popupAnchor: [-3, -76],
                        });

                        // Création du marqueur avec l'icône
                        let marqueur = L.marker([latitude, longitude], {
                            icon: myIcon
                        }).bindPopup(
                            `<h3>${nom}</h3><p>${adresse}</p><a target="_blank">Site Web</a>`
                        );

                        marqueur.addTo(map);
                        marqueurPositions.push([latitude, longitude]);
                    });

                    // Adapter la vue à tous les marqueurs
                    if (marqueurPositions.length > 0) {
                        let limites = L.latLngBounds(marqueurPositions);
                        map.fitBounds(limites);
                    }
                })
                .catch((error) => {
                    console.error("Erreur:", error);
                });
        }
    </script>
</body>

</html>
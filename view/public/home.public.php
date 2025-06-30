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


            <?php if (!empty($locations)): ?>
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
                                    <a href="#" onclick="flyToLocation(
    <?= (float)$location['latitude'] ?>,
    <?= (float)$location['longitude'] ?>
); return false;">
                                        <?= htmlspecialchars($location['adresse']) ?>
                                    </a> |
                                    <?= htmlspecialchars($location['codepostal']) ?> -
                                    <?= htmlspecialchars($location['ville']) ?> |
                                    <?= "Nombre de vélos : " . htmlspecialchars($location['nb_velos']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <h2>Pas encore de lieux</h2>
            <?php endif; ?>
        <?php endif; ?>

    </div>

    <script src="../../public/js/main.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Initialisation de la carte
        let map = L.map("carte", {
            center: [50.84, 4.35],
            zoom: 13
        });

        // Fond de carte OpenStreetMap
        L.tileLayer("https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png", {
            maxZoom: 20,
            attribution: '&copy; OpenStreetMap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        let marqueurPositions = [];
        let mesMarqueurs = [];
        fetch(
                "http://localhost/TI3-2025/public/?json"
            )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Erreur de réseau");
                }
                return response.json();
            })
            .then((data) => {

                data.forEach((item) => {
                    let nom = item.nom;
                    let adresse = item.adresse;
                    let codepostal = item.codepostal;
                    let ville = item.ville;
                    let nb_velos = item.nb_velos;
                    let latitude = item.latitude;
                    let longitude = item.longitude;

                    marqueurPositions.push([latitude, longitude]);
                    // Icône personnalisée
                    let myIcon = L.icon({
                        iconUrl: "../public/img/1.png",
                        iconSize: [30, 30],
                        iconAnchor: [22, 94],
                        popupAnchor: [-3, -76],
                    });

                    // Création du marqueur avec l'icône
                    let marqueur = L.marker([latitude, longitude], {
                            icon: myIcon
                        })
                        .bindPopup(`

    <h3>${nom}</h3>
    <p>
        <a href="https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(adresse)}"
           target="_blank">
            ${adresse}
        </a> ${codepostal} ${ville}
    </p>
    <p>🚲 Nombre de vélos : ${nb_velos}</p>

    `);

                    // ➕ Ajoute cet événement de clic pour zoomer + ouvrir popup
                    marqueur.on("click", function() {
                        map.flyTo([latitude, longitude], 17, {
                            animate: true,
                            duration: 1.5
                        });
                        marqueur.openPopup();
                    });

                    marqueur.addTo(map);
                    mesMarqueurs.push(marqueur);
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

        function flyToLocation(lat, lng) {
            map.flyTo([lat, lng], 17, {
                animate: true,
                duration: 1.5
            });

            map.once("moveend", () => {
                mesMarqueurs.forEach((marqueur) => {
                    const pos = marqueur.getLatLng();
                    const distance = map.distance(pos, L.latLng(lat, lng));
                    if (distance < 1) {
                        marqueur.openPopup();
                    }
                });
            });
        }
    </script>
</body>

</html>
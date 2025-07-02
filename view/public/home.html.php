<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/css/style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@latest/dist/Control.Geocoder.css"/>
    <title>TI3_2025</title>
</head>
<body>
<main>
    <div class="container">
        <h1 class="">Carte interactive</h1>
        <p>Parcours BD à Bruxelles</p>
        <a id="connect-btn" href="?pg=login">Connexion à <br> l'administration</a>

    </div>
    <section class="map-layout">
        <!-- Map container -->
        <div id="carte"></div>
        <!-- List container -->
        <div class="list-container">
            <div class="titles">
                <h2>Liste des points</h2>
                <p>Cliquez sur un élément dans la liste ci-dessous pour le situer sur la carte</p>
            </div>

            <div class="map-container">
                <?php if (empty($localisations)): ?>
                    <h3>Pas encore de localisation</h3>
                <?php else: ?>
                    <?php foreach ($localisations as $localisation): ?>
                        <div class="location">
                            <ul>
                                <li>
                                    <p><?php echo($localisation['rue']); ?>, <?php echo($localisation['codepostal']); ?> <?php echo($localisation['ville']); ?>
                                        <a id="link-loc" href="#">Link</a></p>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder@latest/dist/Control.Geocoder.js"></script>
<script src="../public/js/app.js"></script>

</body>
</html>
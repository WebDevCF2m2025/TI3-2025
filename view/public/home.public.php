<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />

    <link rel="stylesheet" href="css/style.css">
    <title>Mon site</title>

</head>

<body>
    <div class="main">

        <!-- Si c'est la page de connexion -->
        <?php if (isset($_GET['page']) && $_GET['page'] === 'conn'): ?>
            <form id="connectForm" method="post">
                <div>
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login" autofocus>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div>
                    <button type="submit">Se connecter</button>
                    <a href="./" class="back-link">Revenir à la page d'accueil</a>
                    <?php if (isset($error)) : ?>
                        <span id="spanErr" style="color: red;">
                            <?= $error; ?>
                            <?php unset($error); ?>
                        </span>
                    <?php endif; ?>
                    <script>

                    </script>


                </div>
            </form>
        <?php else: ?>

            <!-- Sinon on affiche l'accueil -->
            <h1>Carte interactive</h1>
            <h2>Thème de la carte</h2>
            <a id="adminBtn" href="?page=conn">Connexion à<br> l'administration</a>


            <!-- Si les données ne sont pas vides, on les affiches -->
            <?php if (!empty($locations)): ?>
                <div id="carteAndList">
                    <div id="carte"></div>

                    <div class="scrollable-list">
                        <div class="list-header">
                            <h2>Liste des points</h2>
                            <h3>Cliquez sur un élément dans la liste ci-dessous pour le situer sur la carte</h3>
                        </div>
                        <ul>
                            <?php foreach ($messages as $location): ?>
                                <li>
                                    <a href="" class="goto-marker"
                                        data-lat="<?= (float)$location['latitude'] ?>"
                                        data-lng="<?= (float)$location['longitude'] ?>">
                                        <?= htmlspecialchars($location['adresse']) ?>
                                    </a> |
                                    <?= htmlspecialchars($location['codepostal']) ?> -
                                    <?= htmlspecialchars($location['ville']) ?> |
                                    <?= "Nombre de vélos : " . htmlspecialchars($location['nb_velos']) ?>
                                </li>
                            <?php endforeach; ?>
                            
                        </ul>
                        <?= $pagination ?>
                    </div>
                </div>

                <!-- Sinon on affiche rien -->
            <?php else: ?>
                <h2>Pas encore de lieux</h2>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    <script src="js/main.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Personal - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href=""><span class="fw-bolder text-primary">Start Bootstrap</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="./">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="?page=admin">Administration</a></li>
                        <li class="nav-item"><a class="nav-link" href="?page=destroy">Deconnexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Si page admin -->
        <?php if (isset($_GET['page']) && $_GET['page'] === 'admin') : ?>


            <?php
            $messages = ['delete_message', 'add_message', 'update_message'];

            foreach ($messages as $msg) {
                if (isset($_SESSION[$msg])) {
                    echo '<div class="alert alert-success alert-dismissible text-center fade show" role="alert">';
                    echo '<span style="font-size: 1.1rem; font-weight: bold;">' . $_SESSION[$msg] . '</span>';
                    echo '</div>';
                    unset($_SESSION[$msg]);
                    break; // on affiche un seul message à la fois
                }
            }
            ?>

            <div class="container my-5">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered shadow-sm rounded">
                        <thead class="table-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th class="d-none d-sm-table-cell">Code Postal</th>
                                <th>Ville</th>
                                <th class="d-none d-md-table-cell">Nb Vélos</th>
                                <th class="d-none d-lg-table-cell">Latitude</th>
                                <th class="d-none d-lg-table-cell">Longitude</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($locations as $location): ?>
                                <tr>
                                    <td><?= htmlspecialchars($location['nom']) ?></td>
                                    <td><?= htmlspecialchars($location['adresse']) ?></td>
                                    <td class="d-none d-sm-table-cell"><?= htmlspecialchars($location['codepostal']) ?></td>
                                    <td><?= htmlspecialchars($location['ville']) ?></td>
                                    <td class="d-none d-md-table-cell"><?= (int)$location['nb_velos'] ?></td>
                                    <td class="d-none d-lg-table-cell"><?= htmlspecialchars($location['latitude']) ?></td>
                                    <td class="d-none d-lg-table-cell"><?= htmlspecialchars($location['longitude']) ?></td>
                                    <td class="text-nowrap">
                                        <a href="?page=update&id=<?= $location['id'] ?>" class="btn btn-sm btn-outline-primary me-1" title="Modifier">
                                            ✏️
                                        </a>
                                        <a href="?page=admin&delete=<?= $location['id'] ?>" onclick="return confirm('Confirmer la suppression ?')" class="btn btn-sm btn-outline-danger" title="Supprimer">
                                            🗑️
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Ajout d'une adresse -->
            <div class="container my-4 d-flex justify-content-end">
                <a href="?page=add" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v6.5h6.5a.5.5 0 0 1 0 1H8.5v6.5a.5.5 0 0 1-1 0V8.5H1a.5.5 0 0 1 0-1h6.5V1.5A.5.5 0 0 1 8 1z" />
                    </svg>
                    Ajouter
                </a>
            </div>

            <!-- Carte -->
            
        </div>
    </nav>
    
    <div class="container px-5 my-5">
                <h1 class="navbar-brand text-center fw-bold fs-3">Carte interactive</h1>
                <h4 class="mb-4 text-center">Thème de la carte</h4>

                <?php if (!empty($locations)): ?>
                    <div id="carteAndList" class="d-flex flex-column align-items-center gap-4">
                        <!-- Carte -->
                        <div id="carte" class="border rounded" style="height: 500px; width: 100%; max-width: 900px;"></div>

                        <!-- Liste -->
                        <div class="card shadow-sm w-100" style="max-width: 900px;">
                            <div class="card-body">
                                <h4 class="card-title">Liste des points</h4>
                                <p class="text-muted">Cliquez sur un élément pour le localiser sur la carte :</p>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($locations as $location): ?>
                                        <li class="list-group-item">
                                            <a href="carte" class="goto-marker fw-bold text-decoration-none"
                                                data-lat="<?= (float)$location['latitude'] ?>"
                                                data-lng="<?= (float)$location['longitude'] ?>">
                                                <?= htmlspecialchars($location['adresse']) ?>
                                            </a><br>
                                            <small class="text-muted">
                                                <?= htmlspecialchars($location['codepostal']) ?> -
                                                <?= htmlspecialchars($location['ville']) ?> |
                                                <?= "Vélos : " . htmlspecialchars($location['nb_velos']) ?>
                                            </small>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="alert alert-warning mt-4 text-center" role="alert">
                        Aucun lieu n’a encore été ajouté.
                    </div>
                <?php endif; ?>

                <!-- Si on veut ajouter une adresse  -->
            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'add') : ?>
                <form method="POST" class="container my-4" style="max-width: 600px;">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>

                    <div class="mb-3">
                        <label for="codepostal" class="form-label">Code Postal</label>
                        <input type="text" class="form-control" id="codepostal" name="codepostal">
                    </div>

                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" required>
                    </div>

                    <div class="mb-3">
                        <label for="nb_velos" class="form-label">Nombre de vélos</label>
                        <input type="number" class="form-control" id="nb_velos" name="nb_velos" required min="0" step="1">
                    </div>

                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" class="form-control" id="latitude" name="latitude" required step="any" min="-90" max="90">
                    </div>

                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" class="form-control" id="longitude" name="longitude" required step="any" min="-180" max="180">
                    </div>

                    <button type="submit" class="btn btn-primary" name="addLocation">Ajouter</button>
                </form>

                <!-- Si on veut modifier une adresse -->
            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'update') : ?>
                <form method="POST" class="container my-4" style="max-width: 600px;">
                    <input type="hidden" name="id" value="<?= $location['id'] ?>">

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($location['nom']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= htmlspecialchars($location['adresse']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="codepostal" class="form-label">Code Postal</label>
                        <input type="text" class="form-control" id="codepostal" name="codepostal" value="<?= htmlspecialchars($location['codepostal']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="<?= htmlspecialchars($location['ville']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nb_velos" class="form-label">Nombre de vélos</label>
                        <input type="number" class="form-control" id="nb_velos" name="nb_velos" value="<?= htmlspecialchars($location['nb_velos']) ?>" required min="0" step="1">
                    </div>

                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" class="form-control" id="latitude" name="latitude" value="<?= htmlspecialchars($location['latitude']) ?>" required step="any" min="-90" max="90">
                    </div>

                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" class="form-control" id="longitude" name="longitude" value="<?= htmlspecialchars($location['longitude']) ?>" required step="any" min="-180" max="180">
                    </div>

                    <button type="submit" name="updateLocation" class="btn btn-primary">Mettre à jour</button>
                </form>

                <!-- Sinon on affiche la page d'accueil -->
            <?php else: ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
                        <span style="font-size: 1.1rem; font-weight: bold;">
                            <?= htmlspecialchars($_SESSION['success']) ?>
                        </span>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>


                <!-- Header-->

                <header class="py-5">
                    <div class="container px-5 pb-5">
                        <div class="row gx-5 align-items-center">
                            <div class="col-xxl-5">
                                <!-- Header text content-->
                                <div class="text-center text-xxl-start">
                                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                        <div class="text-uppercase">Design &middot; Development &middot; Marketing</div>
                                    </div>
                                    <div class="fs-3 fw-light text-muted">I can help your business to</div>
                                    <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Get online and grow fast</span></h1>
                                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                        <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="">Resume</a>
                                        <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="">Projects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7">
                                <!-- Header profile picture-->
                                <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                                    <div class="profile bg-gradient-primary-to-secondary">
                                        <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                        <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                        <img class="profile-img" src="assets/profile.png" alt="..." />
                                        <div class="dots-1">
                                            <!-- SVG Dots-->
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 191.6 1215.4" style="enable-background: new 0 0 191.6 1215.4" xml:space="preserve">
                                                <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)">
                                                    <path d="M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z"></path>
                                                    <path d="M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z"></path>
                                                    <path d="M227.7,11508.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,11521.6,289.7,11528.6,227.7,11508.6z"></path>
                                                    <path d="M1507.7,11508.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,11521.6,1569.7,11528.6,1507.7,11508.6z"></path>
                                                    <path d="M227.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,10241.6,289.7,10248.6,227.7,10228.6z"></path>
                                                    <path d="M1507.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,10241.6,1569.7,10248.6,1507.7,10228.6z"></path>
                                                    <path d="M227.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,8961.6,289.7,8968.6,227.7,8948.6z"></path>
                                                    <path d="M1507.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,8961.6,1569.7,8968.6,1507.7,8948.6z"></path>
                                                    <path d="M227.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,7681.6,289.7,7688.6,227.7,7668.6z"></path>
                                                    <path d="M1507.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,7681.6,1569.7,7688.6,1507.7,7668.6z"></path>
                                                    <path d="M227.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,6401.6,289.7,6408.6,227.7,6388.6z"></path>
                                                    <path d="M1507.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,6401.6,1569.7,6408.6,1507.7,6388.6z"></path>
                                                    <path d="M227.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,5121.6,289.7,5128.6,227.7,5108.6z"></path>
                                                    <path d="M1507.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,5121.6,1569.7,5128.6,1507.7,5108.6z"></path>
                                                    <path d="M227.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,3841.6,289.7,3848.6,227.7,3828.6z"></path>
                                                    <path d="M1507.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,3841.6,1569.7,3848.6,1507.7,3828.6z"></path>
                                                    <path d="M227.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,2561.6,289.7,2568.6,227.7,2548.6z"></path>
                                                    <path d="M1507.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,2561.6,1569.7,2568.6,1507.7,2548.6z"></path>
                                                    <path d="M227.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,1281.6,289.7,1288.6,227.7,1268.6z"></path>
                                                    <path d="M1507.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,1281.6,1569.7,1288.6,1507.7,1268.6z"></path>
                                                </g>
                                            </svg>
                                            <!-- END of SVG dots-->
                                        </div>
                                        <div class="dots-2">
                                            <!-- SVG Dots-->
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 191.6 1215.4" style="enable-background: new 0 0 191.6 1215.4" xml:space="preserve">
                                                <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)">
                                                    <path d="M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z"></path>
                                                    <path d="M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z"></path>
                                                    <path d="M227.7,11508.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,11521.6,289.7,11528.6,227.7,11508.6z"></path>
                                                    <path d="M1507.7,11508.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,11521.6,1569.7,11528.6,1507.7,11508.6z"></path>
                                                    <path d="M227.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,10241.6,289.7,10248.6,227.7,10228.6z"></path>
                                                    <path d="M1507.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,10241.6,1569.7,10248.6,1507.7,10228.6z"></path>
                                                    <path d="M227.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,8961.6,289.7,8968.6,227.7,8948.6z"></path>
                                                    <path d="M1507.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,8961.6,1569.7,8968.6,1507.7,8948.6z"></path>
                                                    <path d="M227.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,7681.6,289.7,7688.6,227.7,7668.6z"></path>
                                                    <path d="M1507.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,7681.6,1569.7,7688.6,1507.7,7668.6z"></path>
                                                    <path d="M227.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,6401.6,289.7,6408.6,227.7,6388.6z"></path>
                                                    <path d="M1507.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,6401.6,1569.7,6408.6,1507.7,6388.6z"></path>
                                                    <path d="M227.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,5121.6,289.7,5128.6,227.7,5108.6z"></path>
                                                    <path d="M1507.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,5121.6,1569.7,5128.6,1507.7,5108.6z"></path>
                                                    <path d="M227.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,3841.6,289.7,3848.6,227.7,3828.6z"></path>
                                                    <path d="M1507.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,3841.6,1569.7,3848.6,1507.7,3828.6z"></path>
                                                    <path d="M227.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,2561.6,289.7,2568.6,227.7,2548.6z"></path>
                                                    <path d="M1507.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,2561.6,1569.7,2568.6,1507.7,2548.6z"></path>
                                                    <path d="M227.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,1281.6,289.7,1288.6,227.7,1268.6z"></path>
                                                    <path d="M1507.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,1281.6,1569.7,1288.6,1507.7,1268.6z"></path>
                                                </g>
                                            </svg>
                                            <!-- END of SVG dots-->
                                        </div>
                                        <div class="dots-3">
                                            <!-- SVG Dots-->
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 191.6 1215.4" style="enable-background: new 0 0 191.6 1215.4" xml:space="preserve">
                                                <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)">
                                                    <path d="M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z"></path>
                                                    <path d="M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z"></path>
                                                    <path d="M227.7,11508.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,11521.6,289.7,11528.6,227.7,11508.6z"></path>
                                                    <path d="M1507.7,11508.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,11521.6,1569.7,11528.6,1507.7,11508.6z"></path>
                                                    <path d="M227.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,10241.6,289.7,10248.6,227.7,10228.6z"></path>
                                                    <path d="M1507.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,10241.6,1569.7,10248.6,1507.7,10228.6z"></path>
                                                    <path d="M227.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,8961.6,289.7,8968.6,227.7,8948.6z"></path>
                                                    <path d="M1507.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,8961.6,1569.7,8968.6,1507.7,8948.6z"></path>
                                                    <path d="M227.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,7681.6,289.7,7688.6,227.7,7668.6z"></path>
                                                    <path d="M1507.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,7681.6,1569.7,7688.6,1507.7,7668.6z"></path>
                                                    <path d="M227.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,6401.6,289.7,6408.6,227.7,6388.6z"></path>
                                                    <path d="M1507.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,6401.6,1569.7,6408.6,1507.7,6388.6z"></path>
                                                    <path d="M227.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,5121.6,289.7,5128.6,227.7,5108.6z"></path>
                                                    <path d="M1507.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,5121.6,1569.7,5128.6,1507.7,5108.6z"></path>
                                                    <path d="M227.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,3841.6,289.7,3848.6,227.7,3828.6z"></path>
                                                    <path d="M1507.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,3841.6,1569.7,3848.6,1507.7,3828.6z"></path>
                                                    <path d="M227.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,2561.6,289.7,2568.6,227.7,2548.6z"></path>
                                                    <path d="M1507.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,2561.6,1569.7,2568.6,1507.7,2548.6z"></path>
                                                    <path d="M227.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,1281.6,289.7,1288.6,227.7,1268.6z"></path>
                                                    <path d="M1507.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,1281.6,1569.7,1288.6,1507.7,1268.6z"></path>
                                                </g>
                                            </svg>
                                            <!-- END of SVG dots-->
                                        </div>
                                        <div class="dots-4">
                                            <!-- SVG Dots-->
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 191.6 1215.4" style="enable-background: new 0 0 191.6 1215.4" xml:space="preserve">
                                                <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)">
                                                    <path d="M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z"></path>
                                                    <path d="M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z"></path>
                                                    <path d="M227.7,11508.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,11521.6,289.7,11528.6,227.7,11508.6z"></path>
                                                    <path d="M1507.7,11508.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,11521.6,1569.7,11528.6,1507.7,11508.6z"></path>
                                                    <path d="M227.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,10241.6,289.7,10248.6,227.7,10228.6z"></path>
                                                    <path d="M1507.7,10228.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,10241.6,1569.7,10248.6,1507.7,10228.6z"></path>
                                                    <path d="M227.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,8961.6,289.7,8968.6,227.7,8948.6z"></path>
                                                    <path d="M1507.7,8948.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,8961.6,1569.7,8968.6,1507.7,8948.6z"></path>
                                                    <path d="M227.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,7681.6,289.7,7688.6,227.7,7668.6z"></path>
                                                    <path d="M1507.7,7668.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,7681.6,1569.7,7688.6,1507.7,7668.6z"></path>
                                                    <path d="M227.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,6401.6,289.7,6408.6,227.7,6388.6z"></path>
                                                    <path d="M1507.7,6388.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,6401.6,1569.7,6408.6,1507.7,6388.6z"></path>
                                                    <path d="M227.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,5121.6,289.7,5128.6,227.7,5108.6z"></path>
                                                    <path d="M1507.7,5108.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,5121.6,1569.7,5128.6,1507.7,5108.6z"></path>
                                                    <path d="M227.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,3841.6,289.7,3848.6,227.7,3828.6z"></path>
                                                    <path d="M1507.7,3828.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,3841.6,1569.7,3848.6,1507.7,3828.6z"></path>
                                                    <path d="M227.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,2561.6,289.7,2568.6,227.7,2548.6z"></path>
                                                    <path d="M1507.7,2548.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,2561.6,1569.7,2568.6,1507.7,2548.6z"></path>
                                                    <path d="M227.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,1281.6,289.7,1288.6,227.7,1268.6z"></path>
                                                    <path d="M1507.7,1268.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C1663.7,1281.6,1569.7,1288.6,1507.7,1268.6z"></path>
                                                </g>
                                            </svg>
                                            <!-- END of SVG dots-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- About Section-->
                <section class="bg-light py-5">
                    <div class="container px-5">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-xxl-8">

                                <div class="text-center my-5">
                                    <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                                    <p class="lead fw-light mb-4">My name is Start Bootstrap and I help brands grow.</p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                                    <div class="d-flex justify-content-center fs-2 gap-4">
                                        <a class="text-gradient" href=""><i class="bi bi-twitter"></i></a>
                                        <a class="text-gradient" href=""><i class="bi bi-linkedin"></i></a>
                                        <a class="text-gradient" href=""><i class="bi bi-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            <?php endif; ?>


    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>

</html>
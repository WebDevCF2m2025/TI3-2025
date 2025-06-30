<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Carte interactive | Connexion</title>
    <!-- CDN Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="./">
            <img src="https://www.cf2m.be/img/logo.png" alt="Logo CF2M" height ="40" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Ouvrir le menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"> <a class="nav-link <?= !isset($_GET['pg']) ? 'active' : '' ?>" href="./">Accueil</a></li>
                <li class="nav-item"> <a class="nav-link <?= (isset($_GET['pg']) && $_GET['pg'] === 'login') ? 'active' : '' ?>" href="./?pg=login">Connexion</a></li>
            </ul>
        </div>
    </div>
</nav>

<h1 class="mb-4 text-center">Carte interactive | Connexion à l'administration</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white rounded shadow-sm p-4">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger text-center"><?=$error?></div>
                <?php endif; ?>
                <form action="" name="login" method="post">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Votre login" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="userpwd" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="Votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
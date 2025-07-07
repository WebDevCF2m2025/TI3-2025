<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte interactive | Connexion</title>
    <!-- Icône -->
    <link rel="icon" type="image/png" href="img/map.png">
    <!-- Thème Bootstrap dark via Bootswatch -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/darkly/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="css/style.admin.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600&display=swap" rel="stylesheet">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body class="bg-dark" data-bs-theme="dark">
<?php include "_menu.public.html.php"; ?>

<div class="container py-5">
    <h1 class="mb-4 text-center text-light">Connexion à l'administration</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="login-card rounded shadow p-4 p-md-5">
                <?php if (isset($error)) : ?>
                    <div class="alert text-center mb-4"><?= htmlspecialchars($error) ?></div>
                <?php elseif (isset($success)) : ?>
                    <div class="alert alert-success text-center mb-4">Connexion réussie ! Redirection en cours... </div>
                    <script>
                        setTimeout(function(){ window.location.href="./?pg=admin"; },2000);
                    </script>
                <?php endif; ?>
                <form action="" name="login" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Votre login" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="userpwd" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="Votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

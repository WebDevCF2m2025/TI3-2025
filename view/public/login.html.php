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

<?php
include "_menu.public.html.php";
?>

<h1 class="mb-3 text-center">Carte interactive | Connexion à l'administration</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white rounded shadow p-4">
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
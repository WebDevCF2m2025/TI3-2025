<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="bg-white p-4 rounded shadow">
        <h1 class="my-4 text-center">Connexion à l'Administration</h1>

        <!-- Messages de succès ou d'erreur -->
        <div class="my-3 <?php echo $displaySuccess ?? 'd-none'; ?> alert alert-success" id="successMessage">
            Connecté, vous allez être redirigé !
        </div>
        <div class="my-3 <?php echo $displayError ?? 'd-none'; ?> alert alert-danger" id="errorMessage">
            Information(s) incorrecte(s)!
        </div>

        <!-- Formulaire de connexion -->
        <form class="<?php echo $displayForm ?? ''; ?>" action="" method="post">
            <div class="my-2">
                <label class="my-2" for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Votre nom d'utilisateur" required autofocus>
            </div>
            <div class="my-2">
                <label class="my-2" for="passwd">Mot de passe</label>
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 my-2">Se connecter</button>
        </form>

        <!-- Lien pour retourner à la page d'accueil -->
        <div class="text-center my-3">
            <a href="./">Retour à l'accueil</a>
        </div>
    </div>

    <!-- Script de redirection après une connexion réussie -->
    <?php if (isset($jsRedirect)) echo $jsRedirect; ?>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center">
    <div class="login-container bg-white p-4 rounded shadow-sm">
        <h1 class="mb-4 text-center">Connexion à l'Administration</h1>

        <!-- Messages de succès ou d'erreur -->
        <div class="mt-3 <?php echo $displaySuccess ?? 'd-none'; ?> alert alert-success" id="successMessage">
            Connecté, vous allez être redirigé !
        </div>
        <div class="mt-3 <?php echo $displayError ?? 'd-none'; ?> alert alert-danger" id="errorMessage">
            Information(s) incorrecte(s)!
        </div>

        <!-- Formulaire de connexion -->
        <form class="<?php echo $displayForm ?? ''; ?>" action="" method="post">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Votre nom d'utilisateur" required autofocus>
            </div>
            <div class="form-group">
                <label for="passwd">Mot de passe</label>
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>

        <!-- Lien pour retourner à la page d'accueil -->
        <div class="text-center mt-3">
            <a href="./">Retour à l'accueil</a>
        </div>
    </div>

    <!-- Script de redirection après une connexion réussie -->
    <?php if (isset($jsRedirect)) echo $jsRedirect; ?>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte interactive | Connexion</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="../../public/css/styles.css" />
</head>
<body class="bg-light">

<h1 class="login-title">Carte interactive | Connexion</h1>
<div class="login-wrapper">
    <h2 class="login-subtitle">Veuillez-vous connecter</h2>
    <div class="alert-success-custom <?=$displaySucces?>" id="successMessage">Merci de vous être connecté !</div>
    <div class="alert-danger-custom <?=$displayError?>" id="errorMessage">Login et/ou mot de passe incorrecte !</div>
    <form class="login-form <?=$displayForm?>" action="" name="login" method="post">
        <div class="form-group">
            <label for="username" class="form-label-custom">Login</label>
            <input type="text" class="form-control-custom" id="username" name="username" required autofocus>
        </div>
        <div class="form-group">
            <label for="passwd" class="form-label-custom">Mot de passe</label>
            <input type="password" class="form-control-custom" id="passwd" name="passwd" required>
        </div>
        <button type="submit" class="btn-custom">Se connecter</button>
    </form>
    <?php if(isset($jsRedirect)) echo $jsRedirect; ?>
</div>
</body>
</html>
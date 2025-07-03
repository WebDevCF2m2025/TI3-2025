<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte interactive | Connexion</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light text-center">

<h1 class="h1 m-4">Carte interactive | Connexion</h1>



<div class="row justify-content-center text-center my-3">
    
    <div class="alert alert-success mt-2 <?=$displaySucces?>" id="successMessage">Merci de vous être connecté ! Redirection en cours ...</div>
    <div class="alert alert-danger mt-2 <?=$displayError?>" id="errorMessage">Login et/ou mot de passe incorrecte !</div>

    <form class="col-4 bg-white border rounded form <?=$displayForm?>" action="" name="login" method="post">
        <div class="form-group">
            

            <h3 class="login-subtitle h3 my-3">Veuillez-vous connecter</h3>
            <label for="username" class="form-label fw-bold">Login</label>
            <input type="text" class="form-control mb-3" id="username" name="username" required autofocus>
        </div>
        <div class="form-group">
            <label for="passwd" class="form-label fw-bold">Mot de passe</label>
            <input type="password" class="form-control " id="passwd" name="passwd" required>
        </div>
        <button type="submit" class="btn btn-primary m-3 px-5">Se connecter</button>
    </form>

    <?php if(isset($jsRedirect)) echo $jsRedirect; ?>
</div>

</body>
</html>
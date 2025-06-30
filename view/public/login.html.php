<?php
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ti3_2025_accueil</title>
        <link rel="icon" type="" href=""/>
        <link rel="stylesheet" href="../../public/css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <?php
        include "_menu.html.php";
        ?>
        <h1 class="mb-4 text-center"> Connexion </h1>
        <div class="container">
            <div class="bg-white p-4 rounded shadow-sm mb-5">
        <h3 class="mb-4 "></h3>
                <h2 class="mb-4 text-center">Veuillez-vous connecter</h2>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                        <div class="bg-white rounded shadow-sm p-4">
                        <div class="mt-3 <?=$displaySucces?>  alert alert-success" id="successMessage">Merci de vous être connecté !</div>
                        <div class="mt-3 <?=$displayError?> alert alert-danger" id="errorMessage">Login et/ou mot de passe incorrecte !</div>
                        <form class="<?=$displayForm?>" action="" name="username" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Login</label>
                                <input type="text" class="form-control" id="login" name="login" placeholder="Votre login" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="userpwd" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="Votre mot de passe" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                        </form>
                        <?php
                        // si nous sommes connectés, nous activons une redirection javascript
                        if(isset($jsRedirect)) echo $jsRedirect;
                        ?>
                    </div>
                </div>
            </div>
          



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    </body>

</html>
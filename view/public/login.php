<?= "/loginPage";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC-CRUD-Procedural | Connexion</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="bg-light">
<?php include_once "../view/menu.php"; ?>
<h1 class="mb-4 text-center">Connexion</h1>
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm mb-5">

        <h2 class="mb-4 text-center">Veuillez-vous connecter</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-white rounded shadow-sm p-4">
                        <div class="mt-3 <?=$displaySucces?>  alert alert-success" id="successMessage">Merci de vous être connecté !</div>
                        <div class="mt-3 <?=$displayError?> alert alert-danger" id="errorMessage">Login et/ou mot de passe incorrecte !</div>
                        <form class="" action="" name="login" method="post">
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
                        <?php
                        // si nous sommes connectés, nous activons une redirection javascript
                        if(isset($jsRedirect)) echo $jsRedirect;
                        ?>
                    </div>
                </div>
            </div>
</body>
</html>

<?php var_dump($_POST); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MVC-CRUD-Procedural | Connexion</title>
  <link rel="icon" type="image/x-icon" href="img/logo.png"/>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-light">
<?php
include "menu.html.php";
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Connexion</h1>
<div class="container">
  <div class="bg-dark p-4 rounded shadow-sm mb-5 map-container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="bg-dark rounded shadow-sm p-4 ">
          <h2>Veuillez vous connectez </h2>
          <div class="mt-3 <?=$displaySucces?>  alert alert-success" id="successMessage">Merci de vous être connecté !</div>
          <div class="mt-3 <?=$displayError?> alert alert-danger" id="errorMessage">Login et/ou mot de passe
            incorrecte !</div>
          <form class="<?=$displayForm?>" action="" name="username" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Login</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Votre username"
                     required
                     autofocus>
            </div>
            <div class="mb-3">
              <label for="passwd" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Votre mot de passe"
                     required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
          </form>
          <?php
          // si connecté, redirection js
          if(isset($jsRedirect)) echo $jsRedirect;
          ?>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

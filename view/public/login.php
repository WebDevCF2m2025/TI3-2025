<?php // "/loginPage"; ?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion</title>
  <link rel="icon" type="image/x-icon" href="img/logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body class="body text-light" data-bs-theme="dark">
  <?php include_once "../view/menu.php"; ?>

  <h1 class="mb-4 text-center">Connexion</h1>

  <div class="container">
    <div class="bg-gradient p-4 rounded shadow mb-5">
      <h2 class="mb-4 text-center">Veuillez-vous connecter</h2>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="bg-body-color border border-dark rounded shadow-sm p-4">

            <div class="mt-3 <?=$displaySucces?> alert alert-success text-dark bg-success bg-opacity-75 text-light" id="successMessage">
              Merci de vous être connecté !
            </div>

            <div class="mt-3 <?=$displayError?> alert alert-danger bg-danger bg-opacity-75 text-light" id="errorMessage">
              Login et/ou mot de passe incorrecte !
            </div>

            <form action="" method="post">
              <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control bg-dark text-light border-dark" id="login" name="login" placeholder="Votre login" required autofocus>
              </div>

              <div class="mb-3">
                <label for="userpwd" class="form-label">Mot de passe</label>
                <input type="password" class="form-control bg-dark text-light border-dark" id="userpwd" name="userpwd" placeholder="Votre mot de passe" required>
              </div>

              <button type="submit" class=" btn btn-success border border-dark w-100">Se connecter</button>
            </form>

            <?php if (isset($jsRedirect)) echo $jsRedirect; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
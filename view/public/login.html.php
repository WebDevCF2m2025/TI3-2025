<?php
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ti3_2025_accueil</title>
    <link rel="icon" href="" type="" />

    <link rel="stylesheet" href="../../public/css/style.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
  </head>
  <body class="bg-secondary">

  <?php include "../view/_menu.html.php"; ?>

    <div class="container py-5 w-50">
      <h1 class="mb-4 text-center text-light">Connexion</h1>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="bg-light p-4 rounded shadow-sm border">

            <h3 class="mb-4 text-center">Veuillez vous connecter</h3>

           
            <div class="mt-3 <?=$displaySucces?> alert alert-success" id="successMessage">
              <i class="bi bi-check-circle-fill me-2"></i> Merci de vous être connecté !
            </div>

           
            <div class="mt-3 <?=$displayError?> alert alert-danger" id="errorMessage">
              <i class="bi bi-exclamation-triangle-fill me-2"></i> Login et/ou mot de passe incorrect !
            </div>

           
            <form class="<?=$displayForm?>" action="" method="post">
              <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Votre login"
                  required
                  autofocus
                />
              </div>

              <div class="mb-3">
                <label for="userpwd" class="form-label">Mot de passe</label>
                <input
                  type="password"
                  class="form-control"
                  id="passwd"
                  name="passwd"
                  placeholder="Votre mot de passe"
                  required
                />
              </div>

              <button type="submit" class="btn btn-dark w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i> Se connecter
              </button>
            </form>

            <?php
           
            if (isset($jsRedirect)) echo $jsRedirect;
            ?>

          </div>
        </div>
      </div>
    </div>

 
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

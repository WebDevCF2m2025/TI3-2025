<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body class="bg-dark text-light">

  <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="card bg-secondary bg-opacity-25 p-4 col-12 col-sm-10 col-md-8 col-lg-5">
      <h2 class="text-center mb-4">
        <i class="bi bi-shield-lock-fill me-2"></i>Connexion
      </h2>

      <form method="post" action="">
        <div class="mb-3">
          <label for="login" class="form-label">Identifiant</label>
          <div class="input-group input-group-lg">
            <span class="input-group-text bg-dark border-light text-light">
              <i class="bi bi-person-fill"></i>
            </span>
            <input type="text" class="form-control bg-dark text-light border-light" id="login" name="login" />
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <div class="input-group input-group-lg">
            <span class="input-group-text bg-dark border-light text-light">
              <i class="bi bi-lock-fill"></i>
            </span>
            <input type="password" class="form-control bg-dark text-light border-light" id="password" name="password" />
          </div>
        </div>

        <?php if (isset($errorConnect)) : ?>
          <div class="alert alert-danger text-center py-2 mb-4">
            <?= htmlspecialchars($errorConnect) ?>
          </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary btn-lg w-100">Se connecter</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

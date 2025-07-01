
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <nom>MVC-CRUD-Procedural | Connexion</nom>
  <link rel="icon" type="image/x-icon" href="img/logo.png"/>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
<?php
include "menu.html.php";
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Administration | Modification</h1>
<div class="container">
  <div class="bg-white p-4 rounded shadow-sm mb-5">
    <h4 class="mb-3 text-left mb-3"><a href="?pg=admin">Retour à l'administration</a></h4>
    <p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
    <h3 class="mb-3 text-left mb-3">Formulaire d'update de l'article "<?=$marker['adresse']?>"</h3>
    <?php
    if(isset($merci)):
      ?>
      <h4 class="alert alert-success">Merci pour votre mise à jour !</h4>
      <script>
        setTimeout(function(){ window.location.href="./?pg=admin"; },3000);
      </script>
    <?php
    endif;
    ?>
    <div class="container">
      <div class="bg-white p-4 rounded shadow-sm mb-5">
        <h2 class="mb-3 text-center mb-5">Modification de l'article</h2>
        <!-- on affiche l'erreur -->
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?=$error?></div>
          <a href="javascript:history.go(-1);">Revenir sur l'article et le corriger</a>
          <hr>
        <?php endif; ?>
        <form class="<?=$displayForm?>" action="" method="post" name="marker">
          <input type="hidden" name="id" value="<?=$marker['id']?>">
          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required
                   placeholder="Nom du marqueur" value="<?=$marker['nom']?>">
          </div>
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" maxlength="165" required
                   placeholder="adresse" value="<?=$marker['adresse']?>">
          </div>
          <div class="mb-3">
            <label for="postal" class="form-label">Code Postal</label>
            <input type="text" class="form-control" id="postal" name="codepostal" maxlength="165" required
                   placeholder="code Postal" value="<?=$marker['codepostal']?>">
          </div>
          <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" maxlength="165" required
                   placeholder="ville" value="<?=$marker['ville']?>">
          </div>
          <div class="mb-3">
            <label for="velos" class="form-label">Nombre de vélo</label>
            <input type="text" class="form-control" id="velos" name="nb_velos" maxlength="165" required
                   placeholder="Nombre de vélos" value="<?=$marker['nb_velos']?>">
          </div>
          <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" maxlength="165" required
                   placeholder="Latitude" value="<?=$marker['latitude']?>">
          </div>
          <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" maxlength="165" required
                   placeholder="longitude" value="<?=$marker['longitude']?>">
          </div>


          <input type="hidden" name="id" value="<?=$_SESSION['idutilisateurs']?>">
          <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>
      </div>
    </div>
  </div>


  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

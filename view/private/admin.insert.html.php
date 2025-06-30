<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC-CRUD-Procedural | Administration | Nouvel article</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
include "_menu.html.php";
?>
<h1 class="mb-4 text-center">Carte interactive | Administration | Nouvel article</h1>
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm mb-5">
        <h4 class="mb-3 text-left mb-3"><a href="?pg=admin">Retour à l'administration</a></h4>
        <p>Bienvenue sur votre espace d'administration : <?=$_SESSION['username']?></p><hr>
        <?php
        if(isset($thanks)):
            ?>
            <h4 class="alert alert-success">Merci pour votre article !</h4>
            <script>
                setTimeout(function(){ window.location.href="./?pg=admin"; },3000);
            </script>
        <?php
        endif;
        ?>
        <h2 class="mb-5 text-center">Ajouter une localisation</h2>
        <div class="container">
            <div class="bg-white p-4 rounded shadow mb-5">
                <!-- on affiche l'erreur -->
                <?php if (isset($probleme)): ?>
                    <div class="alert alert-danger">Erreur lors de l'insertion d'un article</div>
                    <a href="javascript:history.go(-1);">Revenir sur l'article et le corriger</a>
                    <hr>
                <?php endif; ?>
                <form action="" method="post" name="article">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numéro</label>
                        <input type="text" class="form-control" id="numero" name="numero" required>
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" required>
                    </div>
                    <div class="mb-3">
                        <label for="codepostal" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="codepostal" name="codepostal" required>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
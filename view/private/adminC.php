<?="/adminC";?>



<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC-CRUD-Procedural | Administration | Nouvel article</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="bg-light">
<?php
include_once "../view/menu.php"; 
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Administration | Nouvel article</h1>
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm mb-5">
        <h4 class="mb-3 text-left mb-3"><a href="?pg=adminR">Retour à l'administration</a></h4>
<p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
        <h3 class="mb-3 text-left mb-3">Formulaire d'insertion</h3>
        <?php
        if(isset($merci)):
        ?>
        <h4 class="alert alert-success">Merci pour votre article !</h4>
        <script>
            setTimeout(function(){ window.location.href="./?pg=admin"; },3000);
        </script>
        <?php
        endif;
        ?>
            <div class="container">
                <div class="bg-white p-4 rounded shadow-sm mb-5">
                    <h2 class="mb-3 text-center mb-5">Ajouter un article</h2>
                    <!-- on affiche l'erreur -->
                    <?php if (isset($probleme)): ?>
                        <div class="alert alert-danger">Erreur lors de l'insertion d'un article</div>
                    <a href="javascript:history.go(-1);">Revenir sur l'article et le corriger</a>
                    <hr>
                    <?php endif; ?>
                    <form action="" method="post" name="article">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" maxlength="160" required placeholder="Titre de l'article">
                        </div>
                        <div class="mb-3">
                            <label for="articletext" class="form-label">Texte</label>
                            <textarea class="form-control" id="articletext" name="articletext" rows="6" required placeholder="Votre texte"></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="articlepublished" name="articlepublished" value="1">
                            <label class="form-check-label" for="articlepublished">Publier ?</label>
                        </div>
                        <div id="dateContainer" class="mb-3 d-none">
                            <label class="form-label fw-semibold">Date et heure de publication :</label>
                            <input type="datetime-local" name="articledatepublished" class="form-control">
                        </div>
                        <input type="hidden" name="iduser" value="<?=$_SESSION['iduser']?>">
                        <button type="submit" class="btn btn-primary">Envoyer</button>

                    </form>
                </div>
            </div>
        </div>
    <script>
        // affichage du formulaire si on choisit publier.
        document.getElementById('articlepublished').addEventListener('change', function () {
            const dateContainer = document.getElementById('dateContainer');
            dateContainer.classList.toggle('d-none', !this.checked);
        });
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?="/adminU";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC-CRUD-Procedural | Administration | Modification</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="bg-light">
<?php
include_once "../view/menu.php"; 
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Administration | Modification</h1>
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm mb-5">
        <h4 class="mb-3 text-left mb-3"><a href="?pg=adminR">Retour à l'administration</a></h4>
<p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
        <h3 class="mb-3 text-left mb-3">Formulaire d'update de l'article "<?=$article['title']?>"</h3>
        <?php
        if(isset($merci)):
        ?>
        <h4 class="alert alert-success">Merci pour votre mise à jour !</h4>
        <script>
            setTimeout(function(){ window.location.href="./?pg=admin"; },1500);
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
                    <form class="<?=$displayForm?>" action="" method="post" name="article">
                        <input type="hidden" name="idarticle" value="<?=$article['idarticle']?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" maxlength="160" required placeholder="Titre de l'article" value="<?=$article['title']?>">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="title" name="slug" maxlength="165" required placeholder="slug" value="<?=$article['slug']?>">
                        </div>
                        <div class="mb-3">
                            <label for="articletext" class="form-label">Texte</label>
                            <textarea class="form-control" id="articletext" name="articletext" rows="6" required placeholder="Votre texte"><?=$article['articletext']?></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <?php
                               $check = $article['articlepublished']===1 ? 'checked':'';
                            ?>
                            <input type="checkbox" class="form-check-input" id="articlepublished" name="articlepublished" value="1" <?=$check?>>
                            <label class="form-check-label" for="articlepublished">Publier ?</label>
                        </div>
                        <div id="dateContainer" class="mb-3">
                            <label class="form-label fw-semibold">Date et heure de publication :</label>
                            <input type="datetime-local" name="articledatepublished" class="form-control" value="<?=$article['articledatepublished']?>">
                        </div>
                        <input type="hidden" name="user_iduser" value="<?=$_SESSION['iduser']?>">
                        <button type="submit" class="btn btn-primary">Envoyer</button>

                    </form>
                </div>
            </div>
        </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
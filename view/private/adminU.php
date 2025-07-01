<?="/adminU";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="bg-light">
<?php
include_once "../view/menu.php"; 
?>
<h1 class="mb-4 text-center">Modification</h1>
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
            setTimeout(function(){ window.location.href="./?pg=adminR"; },1500);
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
                    <form action="" method="post" name="list">
                        <div class="container d-flex justify-content-between">
                            <div class="mb-3  col-lg-5">
                                <label for="nom" class="form-label">nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required placeholder="nom">
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="ville" class="form-label">ville</label>
                                <input type="text" class="form-control" id="ville" name="ville" maxlength="160" required placeholder="ville">
                            </div>
                        </div>
                        <div class="container d-flex justify-content-between">
                            
                            <div class="mb-3 col-lg-5">
                                <label for="adresse" class="form-label">adresse</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" maxlength="160" required placeholder="adresse">
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="codepostal" class="form-label">codepostal</label>
                                <input type="text" class="form-control" id="codepostal" name="codepostal" maxlength="160" required placeholder="codepostal">
                            </div>
                        </div>

                        <div class="container d-flex justify-content-between">
                            <div class="mb-3 col-lg-5">
                                <label for="latitude" class="form-label">latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" maxlength="160" required placeholder="latitude">
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="longitude" class="form-label">longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" maxlength="160" required placeholder="longitude">
                            </div>
                        </div>
                        <div class="container">
                            <input type="hidden" name="iduser" value="<?=$_SESSION['idutilisateurs']?>">
                            <button type="submit" class="btn btn-primary col-lg-12">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
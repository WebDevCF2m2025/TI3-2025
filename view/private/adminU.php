<?php //"/adminU";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="body" data-bs-theme="dark">
<?php
include_once "../view/menu.php"; 
?>
<h1 class="mb-4 text-center">Modification</h1>
<div class="container">
    <div class="bg-dark p-4 rounded shadow-sm mb-5">
        <h4 class="mb-3 text-left mb-3"><a  class="btn btn-success" href="?pg=adminR">Retour à l'administration</a></h4>
        <p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
        <h3 class="mb-3 text-left mb-3">Modifier l'adresse "<?=$adresseU['nom']?>"</h3>
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
                <div class="bg-gradient p-4 rounded shadow-sm mb-5">
                    <h2 class="mb-3 text-center mb-5">Modification de l'adresse</h2>
                    <!-- on affiche l'erreur -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?=$error?></div>
                    <a href="javascript:history.go(-1);">Revenir sur l'adresse</a>
                    <hr>
                    <?php endif; ?>
                    <form action="" method="post" name="list">
                        <div class="container d-flex justify-content-between">
                            <div class="mb-3  col-lg-5">
                                <label for="nom" class="form-label">nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required placeholder="nom" value="<?= $adresseU['nom'];?>">
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="ville" class="form-label">ville</label>
                                <input type="text" class="form-control" id="ville" name="ville" maxlength="160" required placeholder="ville" value="<?= $adresseU['ville'];?>">
                            </div>
                        </div>
                        <div class="container d-flex justify-content-between">
                            
                            <div class="mb-3 col-lg-5">
                                <label for="adresse" class="form-label">adresse</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" maxlength="160" required placeholder="adresse" value="<?= $adresseU['adresse'];?>">
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="codepostal" class="form-label">codepostal</label>
                                <input type="text" class="form-control" id="codepostal" name="codepostal" maxlength="160" required placeholder="codepostal" value="<?= $adresseU['codepostal'];?>">
                            </div>
                        </div>

                        <div class="container d-flex justify-content-between">
                            <div class="mb-3 col-lg-5">
                                <label for="latitude" class="form-label">latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" maxlength="160" required placeholder="latitude" value="<?= $adresseU['latitude'];?>">
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="longitude" class="form-label">longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" maxlength="160" required placeholder="longitude" value="<?= $adresseU['longitude'];?>">
                            </div>
                        </div>
                        <div class="container">
                            <input type="hidden" name="iduser" value="<?=$_SESSION['idutilisateurs']?>">
                            <button type="submit" class="btn btn-success col-lg-12">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
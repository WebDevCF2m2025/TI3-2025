<?="/homePage";?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TI3</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body class="bg-light">
<?php
    if($navActive){
        include_once "../view/menu.php"; 
    }    
?>
    <h1 class="mb-4 text-center">Carte Interactive</h1>
    <div class="container d-flex justify-content-center">
    <?php
    if(!$navActive):
    ?>
    <a href="?pg=login"><button class="btn btn-success fw-bold rounded">Connexion à l'administration</button></a>
    <?php
    endif;
    ?>
        
    </div>
</br>
</body>
</html>

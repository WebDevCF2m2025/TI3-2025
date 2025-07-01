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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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

    <div class="container">
        <div class="box">
            <div class="container">
                <div class="rounded-4" id="carte"></div>
                <div class="tableau"></div>
            </div>


            <div>
                <ul>
                    <?php

                    foreach($lists as $list):
                    ?>
                        <li>
                            <a><?php echo $list['nom']. "| ". $list['adresse']. "| ". $list['codepostal']. "| ". $list['ville']; ?></a>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>

    
    <script src="js/map.js"></script>
</body>
</html>

<?php //"/homePage";?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TI3</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body class="bg-light">

    <!-- matrix -->
    <div id="matrix">
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
        <div class=" matrixGrid"></div>
    </div>

<?php
    if($navActive){
        include_once "../view/menu.php"; 
    }    
?>
    <h1 class="mb-4 text-center">Cartographie des positions sauvegardées </h1>
    <div class="container d-flex justify-content-center">
    <?php
    if(!$navActive):
    ?>
    <a href="?pg=login">Administration</a>
    <?php
    endif;
    ?>
        
    </div>

    <div id="content">
        <div class="content">
        <h2>Datas sauvegardées</h2>
        <h3>Récupération de données via JSON et PHP</h3>
        <div id="resultats">

            <div id="boxCarte">   
                <div id="carte"></div>
                <div id="hub"></div>
            </div>
            
            <div id="boxList">
                <div id="liste"></div>
            </div>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/map.js"></script>
</body>
</html>

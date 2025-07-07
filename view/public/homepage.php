<?php //"/homePage";?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TI3</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body class="body">
<?php
    if($navActive){
        include_once "../view/menu.php"; 
    }  
    
    include_once "../view/loading.php";
?>

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


    <h1 >Cartographie des positions sauvegardées </h1>
    <div >
    <?php
    if(!$navActive):
    ?>
    <a class="admin" href="?pg=login">Administration</a>
    <?php
    endif;
    ?>
        
    </div>

    <div id="content">
        <div class="content">
        <h2>Datas sauvegardées</h2>
        <h3 >Récupération de données via JSON et PHP</h3>
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

<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";



if (!isset($_GET['pg'])) {
// chargement des articles
    $localisations = selectAllLocalisation($db);

    require_once "../view/public/homepage.php";

}elseif($_GET['pg']==='json'){
    

    $localisations = selectAllLocalisation($db);
    header('Content-Type: application/json');
    echo json_encode($localisations);
    exit();
}

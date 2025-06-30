<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";


if($_GET['pg']==='json'){
   
 
    $localisations = selectAllLocalisation($db);
    header('Content-Type: application/json');
    echo json_encode($localisations);
    exit();
}
 


$test = selectAllLocalisation($db);

var_dump($test);
require_once "../view/public/hompade.admin.html.php";

require_once "../view/public/hompage.html.php";
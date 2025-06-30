<?php


require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

$test = selectAllLocalisation($db);

require_once "../view/public/hompade.admin.html.php";

var_dump($test);
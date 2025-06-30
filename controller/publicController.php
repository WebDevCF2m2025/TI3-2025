<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

$test = selectAllLocalisation($db);

var_dump($test);
require_once "../view/public/hompade.admin.html.php";

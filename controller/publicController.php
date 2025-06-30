<?php
# controller/PublicController.php

require_once "../model/localisationsModel.php";
$locations = getAllLocations($db);
$jlocations = json_encode($locations);
require_once "../view/public/home.php";


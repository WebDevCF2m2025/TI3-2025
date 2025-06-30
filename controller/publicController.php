<?php


# controller/PrivateController.php
// chargement des dépendances
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";


 $localisations= selectAllLocalisations($db);



 require_once "../view//private/admin.homepage.html.php";
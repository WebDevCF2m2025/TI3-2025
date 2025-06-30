<?php
require_once('../model/utilisateursModel.php');
require_once('../model/localisationsModel.php');

if (!isset($_GET['page'])) {
} else {
    if ($_GET['page'] === 'conn') {
        header('Location:./');
    } elseif ($_GET['page'] === 'destroy') {
        logoutAdminUser();
    } elseif ($_GET['page'] === 'admin') {
        $locations = getAllLocations($db);
    } elseif ($_GET['page'] === 'add') {
        // $locations = getAllLocations($db);
    }
}
require_once('../view/private/home.private.php');

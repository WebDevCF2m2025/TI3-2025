<?php
require_once('../model/utilisateursModel.php');
require_once('../model/localisationsModel.php');

if (!isset($_GET['page'])) {
} else {
    if ($_GET['page'] === 'conn') {
        header('Location:./');
    } elseif ($_GET['page'] === 'destroy') {
        logoutAdminUser();
    }
}
require_once('../view/private/home.private.php');

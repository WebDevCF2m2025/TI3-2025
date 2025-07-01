<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_GET['page'])) {
    require_once "../view/public/home.php";
} elseif ($_GET['page'] === 'dec') {

    disUser();
    exit();
} elseif ($_GET['page'] === 'admin') {
    require_once "../model/localisationsModel.php";
    require_once "../config-dev.php";
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);
    $localisations = selectAllFromLocalisations($db);
    require_once "../view/private/admin.php";
} elseif ($_GET['page'] === 'create') {
    require_once "../view/private/createPoints.php";
}


<?php
require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";


if (isset($_GET['json'])) {
    $localisations = selectAllFromLocalisations($db);
    echo json_encode($localisations);
    exit();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_GET['page'])) {
    require_once "../view/public/home.php";
} elseif ($_GET['page'] === 'dec') {

    disUser();
    header("Location: ../");
    exit();
} elseif ($_GET['page'] === 'admin') {
    require_once "../model/localisationsModel.php";
    require_once "../config.php";
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);
    $localisations = selectAllFromLocalisations($db);
    require_once "../view/private/admin.php";
} elseif ($_GET['page'] === 'create') {
    require_once "../model/localisationsModel.php";
    require_once "../config.php";
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $codepostal = $_POST['codepostal'] ?? '';
        $ville = $_POST['ville'] ?? '';
        $latitude = $_POST['latitude'] ?? '';
        $longitude = $_POST['longitude'] ?? '';


        insertLocalisation($db, $nom, $adresse, $codepostal, $ville, $latitude, $longitude);


        header("Location: ./?page=admin");
        exit;
    }

    require_once "../view/private/createPoints.php";

} elseif ($_GET['page'] === 'delete' && isset($_GET['id'])) {
    require_once "../model/localisationsModel.php";
    require_once "../config.php";
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);
    deleteLocalisationById($db, $_GET['id']);
    header("Location: /omer/TI-3/public/index.php?page=admin");
    exit;
} elseif ($_GET['page'] === 'update' && isset($_GET['id'])) {
    require_once "../model/localisationsModel.php";
    require_once "../config.php";
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $codepostal = $_POST['codepostal'] ?? '';
        $ville = $_POST['ville'] ?? '';
        $latitude = $_POST['latitude'] ?? '';
        $longitude = $_POST['longitude'] ?? '';
        updateLocalisationById($db, $_GET['id'], $nom, $adresse, $codepostal, $ville, $latitude, $longitude);
        header("Location: /omer/TI-3/public/index.php?page=admin");
        exit;
    } else {
        $localisation = selectLocalisationById($db, $_GET['id']);
        require_once "../view/private/updatePoint.php";
        exit;
    }
}
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
    exit();
} elseif ($_GET['page'] === 'admin') {
    require_once "../model/localisationsModel.php";
    require_once "../config-dev.php";
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);
    $localisations = selectAllFromLocalisations($db);
    require_once "../view/private/admin.php";
} elseif ($_GET['page'] === 'create') {
    require_once "../model/localisationsModel.php";
    require_once "../config-dev.php";
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $codepostal = $_POST['codepostal'] ?? '';
        $ville = $_POST['ville'] ?? '';
        $latitude = $_POST['latitude'] ?? '';
        $longitude = $_POST['longitude'] ?? '';


        insertLocalisation($db, $nom, $adresse, $codepostal, $ville, $latitude, $longitude);


        header("Location: /controller/privateController.php?page=admin");
        exit;
    }

    require_once "../view/private/createPoints.php";

}
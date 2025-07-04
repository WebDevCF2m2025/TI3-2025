<?php
require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";
require_once "../config.php";


if (isset($_GET['json'])) {
    $localisations = selectAllFromLocalisations($db);
    echo json_encode($localisations);
    exit();
}



if (!isset($_GET['page'])) {
    require_once "../view/public/home.php";
} elseif ($_GET['page'] === 'dec') {

    disUser();
    header("Location: ./");
    exit();
} elseif ($_GET['page'] === 'admin') {

    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);
    $localisations = selectAllFromLocalisations($db);
    require_once "../view/private/admin.php";
} elseif ($_GET['page'] === 'create') {
    $displaySucces = "d-none";
    $displayError = "d-none";
    $displayForm = "";


    if (!empty($_POST)) {

        if (insertLocalisation($db, $_POST)) {


            $displayForm = "d-none";
            $jsRedirect = "<script>
            setTimeout(() => {
         window.location.href = './?page=admin';
        }, 2000); // Redirects after 2 seconds
        </script>";

        }

        // header("Location: ./?page=admin");
        // exit;
    }

    require_once "../view/private/createPoints.php";

} elseif ($_GET['page'] === 'delete' && isset($_GET['id'])) {

    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);
    deleteLocalisationById($db, $_GET['id']);
    header("Location: ./?page=admin");
    exit;
} elseif ($_GET['page'] === 'update' && isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $displaySucces = "d-none";
    $displayError = "d-none";
    $displayForm = "";
    $id = (int) $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updateLocalisationById($db, $_POST, $id);

        $displayForm = "d-none";
        $jsRedirect = "<script>
            setTimeout(() => {
         window.location.href = './?page=admin';
        }, 2000); // Redirects after 2 seconds
        </script>";
        require_once "../view/private/updatePoint.php";
    } else {
        $localisation = selectLocalisationById($db, $id);
        require_once "../view/private/updatePoint.php";
        exit;
    }
}
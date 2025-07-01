<?php
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    require_once "../view/public/home.php";

}
if (!isset($_GET['page'])) {
    require_once "../view/public/home.php";
} elseif ($_GET['page'] === 'dec') {

    if (disUser()) {
        require_once "../view/public/home.php";
        exit();
    }
} elseif ($_GET['page'] === "admin") {
    require_once "../view/private/admin.php";

} elseif ($_GET['page'] === "create") {
    require_once "../view/private/createPoints.php";

}
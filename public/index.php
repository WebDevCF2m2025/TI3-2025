<?php



session_start();


require_once "../config-dev.php";



try {

    $db = new PDO(
        DB_DSN,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

} catch (Exception $e) {
    die($e->getMessage());
}

if (isset($_SESSION['login'])) {
    require_once "../controller/privateController.php";
} else {

    require_once "../controller/publicController.php";
}



<?php

require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";
// pour charger les articles en json
if (isset($_GET['json'])) {
    $localisations = selectAllFromLocalisations($db);
    echo json_encode($localisations);
    exit();
}



if (isset($_GET['page']) && $_GET['page'] === 'login') {
    $error = null;
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (authentificateActivedUser($db, $login, $password)) {
            header("Location: ./?page=admin");
            exit;
        } else {
            $error = "Login failed  try again.";
        }
    }
    require_once "../view/public/login.php";
    exit;
}

require_once "../view/public/home.php";
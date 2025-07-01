<?php

require_once "../model/utilisateursModel.php";


if (isset($_GET['page']) && $_GET['page'] === 'login') {
    header("Location: ../view/public/login.php");

    if (isset($_POST['login']) && isset($_POST['password'])) {

        $login = $_POST['login'];
        $password = $_POST['password'];

        if (authentificateActivedUser($db, $login, $password)) {
            header("Location: ../controller/privateController.php");
            exit;
        } else {
            echo "Login failed. Please try again.";
        }
    }

}

require_once "../view/public/home.php";
require_once "../model/localisationsModel.php";

?>
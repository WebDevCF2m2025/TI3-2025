<?php

require_once "../model/utilisateursModel.php";

if (isset($_GET['page']) && $_GET['page'] === 'login') {
    $error = null;
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (authentificateActivedUser($db, $login, $password)) {
            header("Location: ../controller/privateController.php");
            exit;
        } else {
            $error = "Login failed  try again.";
        }
    }
    require_once "../view/public/login.php";
    exit;
}

require_once "../view/public/home.php";
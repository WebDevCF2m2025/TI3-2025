<?php
require_once('../model/utilisateursModel.php');
require_once('../model/localisationsModel.php');

if (isset($_GET['json'])) {
    $allLocation = getAllLocations($db);
    echo json_encode($allLocation);
    exit();
}

if (!isset($_GET['page'])) {
    $locations = getAllLocations($db);
} else {
    if ($_GET['page'] === 'conn') {
        if (isset($_POST['login'], $_POST['password'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);

            $user = authentificateAdminUser($db, $login, $password);

            if ($user) {
                session_regenerate_id(true);
                $_SESSION['iduser'] = $user['username'];
                $_SESSION['login'] = $user['idutilisateurs'];
                $_SESSION['success'] = "Bienvenue sur votre compte " . $user['username'];

                header('Location: ./');
                exit();
            } else {
                $error = "Login ou mot de passe incorrect";
            }
        }
    } elseif ($_GET['page'] === 'admin') {
        header('Location: ./');
        exit();
    }
}
require_once('../view/public/home.public.php');

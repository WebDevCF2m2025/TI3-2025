<?php
require_once('../model/utilisateursModel.php');
require_once('../model/localisationsModel.php');
if (!isset($_GET['page'])) {
} else {
    if ($_GET['page'] === 'conn') {
        if (isset($_POST['login'], $_POST['password'])) {
            $login = htmlspecialchars(strip_tags(trim($_POST['login'])));
            $password = htmlspecialchars(strip_tags(trim($_POST['password'])));

            $user = authentificateAdminUser($db, $login, $password);

            if ($user) {
                session_regenerate_id(true);
                $_SESSION['iduser'] = $user['username'];
                $_SESSION['login'] = $user['idutilisateurs']; 
                header('Location: ./');
                exit();
            } else {
                $erreur = "Login ou mot de passe incorrect.";
            }
        }
    }
}
require_once('../view/public/home.public.php');

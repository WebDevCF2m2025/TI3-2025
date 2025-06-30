<?php
require_once('../model/utilisateursModel.php');
require_once('../model/localisationsModel.php');
if (!isset($_GET['page'])) {
} else {
    if ($_GET['page'] === 'conn') {
        if (isset($_POST['login'], $_POST['password'])) {
            $user = authentificateAdminUser($db, $_POST['login'], $_POST['password']);

            if ($user) {
                session_regenerate_id(true); // sécurité contre le vol de session

                // On stocke les infos de session importantes
                $_SESSION['iduser'] = $user['username'];
                $_SESSION['login'] = $user['idutilisateurs'];

                header('Location: ./'); // redirection après connexion
                exit();
            } else {
                $erreur = "Login ou mot de passe incorrect.";
            }
        }
    }
}
require_once('../view/public/home.public.php');

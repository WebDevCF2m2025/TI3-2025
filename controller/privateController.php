<?php
require_once('../model/utilisateursModel.php');
require_once('../model/localisationsModel.php');



if (!isset($_GET['page'])) {
} else {
    if ($_GET['page'] === 'conn') {
        header('Location:./');
    } elseif ($_GET['page'] === 'destroy') {
        logoutAdminUser();
    } elseif ($_GET['page'] === 'admin') {
        $locations = getAllLocations($db);
    } elseif ($_GET['page'] === 'add') {
        // $locations = getAllLocations($db);
    } elseif ($_GET['page'] === 'delete') {

            if (deleteArticle($db, $_GET['id'])) {
                // Redirige vers la même page sans le paramètre pour éviter de relancer la suppression si on rafraîchit
                header('Location:?page=admin');
                exit;
            } else {
                $erreur = "Erreur lors de la suppression.";
            }
        }
    }
require_once('../view/private/home.private.php');

<?php
require_once('../model/utilisateursModel.php');
require_once('../model/localisationsModel.php');

if (isset($_GET['json'])) {
    $allLocation = getAllLocations($db);
    echo json_encode($allLocation);
    exit();
}

if (!isset($_GET['page'])) {
} else {

    if ($_GET['page'] === 'conn') {
        header('Location:./');
    } elseif ($_GET['page'] === 'destroy') {
        logoutAdminUser();
    } elseif ($_GET['page'] === 'admin') {

        $locations = getAllLocations($db);
        if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
            $id = (int) $_GET['delete'];
            if (deleteLocationById($db, $id)) {
                $_SESSION['delete_message'] = "L'adresse a bien été supprimer";
                header('Location:?page=admin');
                exit;
            } else {
                $erreur = "Erreur lors de la suppression.";
            }
        }
    } elseif ($_GET['page'] === 'add') {
        // Si on soumet le formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addLocation'])) {
            if (addLocation($db, $_POST)) {
                $_SESSION['add_message'] = "Nouvelle localisation ajoutée avec succès.";
                header('Location: ?page=admin');
                exit();
            } else {
                $_SESSION['error_message'] = "Échec de l'ajout de la localisation.";
            }
        }
    } elseif ($_GET['page'] === 'delete') {
        $id = (int) $_GET['id'];
        if (deleteLocationById($db, $id)) {
            $_SESSION['success_message'] = "Utilisateur supprimé avec succès.";
            header('Location:./');
            exit();
        }
    } elseif (isset($_GET['page']) && $_GET['page'] === 'update') {
        $id = (int) $_GET['id'];
        $location = getLocationById($db, $id);

        // Si on soumet le formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateLocation'])) {
            $updated = updateLocationById($db, $_POST, (int) $_POST['id']);

            if ($updated) {
                $_SESSION['update_message'] = "Localisation mise à jour avec succès.";
                header('Location:?page=admin');
                exit();
            } else {
                $_SESSION['error_message'] = "Échec de la mise à jour.";
            }
        }
    } else {
        $success = "Bienvenue, " . $_SESSION['login'];
    }
}
require_once('../view/private/home.private.php');

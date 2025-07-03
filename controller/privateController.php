<?php
# TI3-2025/controller/privateController.php

require_once "../model/LocalisationsModel.php";
require_once "../model/UtilisateursModel.php";

if (isset($_GET['pg'])) {
    // Déconnexion
    if ($_GET['pg'] === "logout") {
        if (disconnectUtilisateur()) {
            header("Location: ./");
        }
        exit();

                // Accueil de l'administration
    } elseif ($_GET['pg'] === "accueil") {
        $localisations = getAllLocalisations($db);
        require_once "../view/public/homePage.html.php";

        // Accueil de l'administration
    } elseif ($_GET['pg'] === "admin") {
        $localisations = getAllLocalisations($db);
        require_once "../view/private/adminAccueil.html.php";

        // Suppression d'une localisation
    } elseif ($_GET['pg'] === "delete" && isset($_GET['id']) && ctype_digit($_GET['id'])) {
        $id = (int)$_GET['id'];
        if (deleteLocalisationById($db, $id)) {
            header("Location: ./?pg=admin");
            exit();
        }

        // Ajout d'une localisation
    } elseif ($_GET['pg'] === "addLocalisation") {
        if (isset($_POST['nom'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['latitude'], $_POST['longitude'])) {
            $insert = addLocalisation($db, $_POST);
            if ($insert === true) {
                $merci = true;
            } else {
                $probleme = true;
            }
        }
        require_once "../view/private/adminInsert.html.php";

        // Mise à jour d'une localisation
    } elseif ($_GET['pg'] === "update" && isset($_GET['id']) && ctype_digit($_GET['id'])) {
        $displayForm = "";
        $id = (int)$_GET['id'];
        $localisation = getLocalisationById($db, $id);
        if ($localisation === false) {
            $error = "Cette localisation n'existe plus";
        }

        if (isset($_POST['nom'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['latitude'], $_POST['longitude'])) {
            $update = updateLocalisationById($db, $_POST);
            if ($update === true) {
                $merci = true;
                $displayForm = "d-none";
            } else {
                $error = "Erreur lors de la modification de la localisation";
            }
        }
        require_once "../view/private/adminUpdate.html.php";
    }
} else {
    // Chargement des localisations pour l'accueil
    $localisations = getAllLocalisations($db);
    require_once "../view/private/adminAccueil.html.php";
}

<?php
# TI3-2025-Sam/controller/privateController.php
if (!isset($_SESSION['username'])) {
    header("Location: ../public/index.php");
    exit();
}

// Dépendances
require "../model/utilisateursModel.php";
require "../model/localisationsModel.php";

if (isset($_GET['json'])) {
    $points = getLocalisations($db);
    header('Content-Type: application/json');
    echo json_encode($points);
    exit();
}

if (isset($_GET['pg'])) {

    // Déconnexion
    if ($_GET['pg'] === 'logout') {
        // appel de la fonction de déconnexion qui doit nous envoyer un booléen
        if (disconnectUser()) {
            // redirection vers la page d'accueil
            header("Location: ./");
            exit();
        }

    // Accueil de l'administration
    } elseif ($_GET['pg'] === 'admin') {
        // Chargement des localisations pour l'administration
        // (BONUS PAGINATION)
        $itemsPerPage = 8;
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $totalLoc = countLocalisations($db);
        $totalPages = (int) ceil($totalLoc / $itemsPerPage);
        $start = ($page - 1) * $itemsPerPage;
        $points = getLocalisationsByPage($db, $start, $itemsPerPage);

        require_once "../view/private/admin.homepage.html.php";

    // On souhaite afficher la page de confirmation avant suppression
    } elseif ($_GET['pg'] === 'confirm_delete'
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        $idLoc = (int)$_GET['id'];
        $point = getOneLocById($db, $idLoc);

        if (!$point) {
            $error = "Lieu introuvable.";
            require_once "../view/private/admin.delete.html.php";
            exit();

        }

        require_once "../view/private/admin.delete.html.php";
        exit();

    // On souhaite supprimer une localisation
    } elseif ($_GET['pg'] === 'delete'
        && $_SERVER['REQUEST_METHOD'] === 'POST'
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        // On convertit le string en int
        $idLoc = (int)$_GET['id'];

        // Suppression d'une localisation
        if (deleteLocById($db, $idLoc)) {
            $deletionSuccess = true;
            require_once "../view/private/admin.delete.html.php";
            exit();
        }

    // On souhaite ajouter une localisation
    } elseif ($_GET['pg'] === 'addLoc') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si les variables de type post attendues sont là
            if (isset($_POST['nom'], $_POST['adresse'], $_POST['numero'], $_POST['codepostal'],
                $_POST['ville'], $_POST['latitude'], $_POST['longitude'])) {
                $insert = addLoc($db, $_POST);

                if ($insert === true) {
                    $thanks = true;
                } else {
                    $probleme = true;
                }
            }
        }

        // Appel de la page d'insertion
        require_once "../view/private/admin.insert.html.php";

    // On souhaite modifier une localisation qu'on récupère par son id qui doit être un string contenant que des entiers
    } elseif ($_GET['pg'] === 'update'
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {
        // On convertit l'id en entier
        $idLoc = (int)$_GET['id'];
        $point = getOneLocById($db, $idLoc);

        if ($point === false) {
            $error = "Localisation introuvable";
            require_once "../view/private/admin.update.html.php";
            exit();

        }


        // Si les variables de type post attendues sont là
        if (isset($_POST['nom'], $_POST['adresse'], $_POST['numero'], $_POST['codepostal'], $_POST['ville'],$_POST['latitude'], $_POST['longitude'])) {
            $update = updateLocById($db, $_POST);
            if ($update === true) {
                $thanks = true;
            } else {
                $error = true;
            }
        }
        // Appel de la page de modification
        require_once "../view/private/admin.update.html.php";

    } else {
        $points = getLocalisations($db);
        require_once "../view/private/admin.homepage.html.php";
    }
} else {
    $points = getLocalisations($db);
    require_once "../view/public/homepage.html.php";
}

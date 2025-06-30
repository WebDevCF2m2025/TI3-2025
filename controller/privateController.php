<?php
# TI3-2025-Sam/controller/privateController.php

// Dépendances
require "../model/utilisateursModel.php";
require "../model/localisationsModel.php";

if (isset($_GET['pg'])) {
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
        $points = getLocalisations($db);
        // Appel de la page d'administration
        require_once "../view/private/admin.homepage.html.php";

    // On souhaite afficher la page de confirmation avant suppression
    } elseif ($_GET['pg'] === 'confirm_delete'
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        $idLoc = (int)$_GET['id'];
        $point = getOneLocById($db, $idLoc);

        if (!$point) {
            die("Lieu introuvable.");
        }

        include "../view/private/admin.delete.html.php";
        exit();

    // On souhaite supprimer une localisation
    } elseif ($_GET['pg'] === 'delete'
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        // On convertit le string en int
        //settype($_GET['id'], 'integer);
        $idLoc = (int)$_GET['id'];

        // Suppression d'une localisation
        if (deleteLocById($db, $idLoc)) {
            header("Location: ./?pg=admin.delete.html.php");
            exit();
        }


    // On souhaite ajouter une localisation
    } elseif ($_GET['pg'] === 'addLoc') {
        // Si les variables de type post attendues sont là
        if (isset($_POST['nom'], $_POST['adresse'], $_POST['numero'], $_POST['codepostal'],
                  $_POST['ville'],$_POST['latitude'], $_POST['longitude'])) {
            $insert = addLoc($db, $_POST);
            if ($insert === true) {
                $thanks = true;
            } else {
                $probleme = true;
            }
        }
        // Appel de la page d'insertion
        require_once "../view/private/admin.insert.html.php";

    // On souhaite modifier une localisation qu'on récupère par son id qui doit être un string contenant que des entiers
    } elseif ($_GET['pg'] === 'update'
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {
        $displayForm = "";
        // On convertit l'id en entier
        $idLoc = (int)$_GET['id'];
        $localisation = getOneLocById($db, $idLoc);

        if ($localisation === false) $error = "Localisation introuvable";

        // Si les variables de type post attendues sont là
        if (isset($_POST['nom'], $_POST['adresse'], $_POST['numero'], $_POST['codepostal'], $_POST['ville'])) {
            $update = updateLocById($db, $_POST);
            if ($update === true) {
                $thanks = true;
                $displayForm = "d-none";
            } else {
                $error = "Erreur lors de la modification d'une localisation";
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

<?php
# TI3-2025-Sam/controller/publicController.php

// Dépendances
require "../model/utilisateursModel.php";
require "../model/localisationsModel.php";

if (isset($_GET['pg'])) {
    if ($_GET['pg'] === 'login') {
        // Page de connexion
        if (isset($_POST['login'], $_POST['userpwd'])) {
            // tentative de connexion
            $connect = connectUser($db, $_POST['login'], $_POST['userpwd']);
            if ($connect === true) {
                // redirection vers l'accueil
                header("Location: ./");
                exit();
            } else {
                $error = "Login et/ou mot de passe incorrect";
            }
        }
        // appel de la page de connexion
        require_once "../view/public/login.html.php";
    } else {

        // appel de la page d'accueil
        $points = getLocalisations($db);
        require_once "../view/public/homepage.html.php";
    }
} else {
    $points = getLocalisations($db);
    // Si on veut récupérer les articles en json
    if (isset($_GET['json'])) {
        header('Content-Type: application/json');
        echo json_encode($points);
        exit();

    } else {
        // Chargement des localisations pour l'accueil
        require_once "../view/public/homepage.html.php";
    }
}
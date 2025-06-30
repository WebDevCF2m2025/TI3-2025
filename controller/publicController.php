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
        // appel du formulaire
        require_once "../view/public/login.html.php";
    } else {
        $points = getLocalisations($db);
        require_once "../view/public/homepage.html.php";
    }
} else {
    $points = getLocalisations($db);
    // Chargement des localisations pour l'accueil
    require_once "../view/public/homepage.html.php";
}
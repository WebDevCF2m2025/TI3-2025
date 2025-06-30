<?php


require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";


if (!isset($_GET['pg'])) {
    // chargement 
     $localisations = selectAllLocalisation($db);

    // chargement  de l'accueil
    require_once "../view/private/administration.html.php";
    } elseif($_GET['pg'] === "admin"); {
        // chargement des tous les articles
        $articles = selectAllArticle($db);

        // chargement du template de l'accueil de l'administration
        require_once "../view/admin.homepage.html.php";
        // suppression d'un article (ctype_digit vérifie qu'un string ne contient que
        // du numérique [0-9]
    };
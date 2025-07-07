<?php
// Dépendances
require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";

// Si on veut des données JSON peu importe le reste
if (isset($_GET['json'])) {
    $points = getLocalisations($db);
    header('Content-Type: application/json');
    echo json_encode($points);
    exit();
}

if (isset($_GET['pg']) && $_GET['pg'] === 'login') {
    // Page de connexion
    if (isset($_POST['login'], $_POST['userpwd'])) {
        $connect = connectUser($db, $_POST['login'], $_POST['userpwd']);
        if ($connect === true) {
            $success = true;
        } else {
            $error = "Login et/ou mot de passe incorrect";
        }
    }
    require_once "../view/public/login.html.php";

} else {
    // Accueil public (chargement des localisations)
    $points = getLocalisations($db);
    require_once "../view/public/homepage.html.php";
}
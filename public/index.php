<?php

/*
 * Contrôleur frontal
 */

session_start();

// configuration de la connexion à la base de données
require_once "../config.php";
require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";



// notre connexion PDO
try {
    // instanciation de PDO
    $db = new PDO(
        DB_DSN,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (Exception $e) {
    die($e->getMessage());
}


// Verification de notre position sur la page dans l'url et si la variable pg existe | ctype_digit = transforme les entrées numérique d'un string en integer
if (isset($_GET[PAGINATION_GET]) && ctype_digit($_GET[PAGINATION_GET])) {
    $page = (int) $_GET[PAGINATION_GET];
} else {
    // par defaut la page -> ?pg=1
    $page = 1;
}

// recup le nombre total de msg dans une variable
$nbTotMessage = getNbTotalLocation($db);

// recuperation de la pagination dans une variable avec les parametres
$pagination = pagination($nbTotMessage, PAGINATION_GET, $page, PAGINATION_NB);

// affiche a partir l'offset, exemple $page=4 ? (4-1)*3=9 ====> affichera 3 message a partir du 10ieme de la bdd
$offset = ($page - 1) * PAGINATION_NB;

// recupere et stock les offset de la bdd
$messages = getLocationPagination($db,  $offset, PAGINATION_NB);


// Chargement du routeur
if (isset($_SESSION['login'])) {
    require_once "../controller/privateController.php";
} else {
    require_once "../controller/publicController.php";
}

// Débogage
// echo '<div class="container"><hr><h3>Barre de débogage</h3><hr>';
// echo '<h4>session_id() ou SID</h4>';
// var_dump(session_id());
// echo '<h4>$_GET</h4>';
// var_dump($_GET);
// echo '<h4>$_SESSION</h4>';
// var_dump($_SESSION);
// echo '<h3>$_POST</h3>';
// var_dump($_POST);
// echo '</div>';


// bonne pratique
$db = null;

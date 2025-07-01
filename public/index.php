<?php
# exemple5MVC/public/index.php

/*
 * Contrôleur frontal
 */

session_start();

// configuration de la connexion à la base de données
require_once "../config-dev.php";


// notre connexion PDO
try {
    // instanciation de PDO
    $db = new PDO(DB_DSN,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

} catch (Exception $e) {
    die($e->getMessage());
}

// Chargement du routeur
if (isset($_SESSION['idutilisateurs'])) {
    require_once "../controller/privateController.php";
} else {
    require_once "../controller/publicController.php";
}



// bonne pratique
$db = null;
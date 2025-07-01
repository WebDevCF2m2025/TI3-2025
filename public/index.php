<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

# TI3-2025-Sam/public/index.php

/*
 * Contrôleur frontal
 */

// Création de la session
session_start();

// Dépendances
require_once "../config.php";

// Connexion PDO
try{
    // Instanciation de PDO
    $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD);
    // Par défaut, on obtient des tableaux associatifs
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // On active l'affichage des erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
    die($e->getMessage());
}

// Si nous sommes connectés
if(isset($_SESSION['username'])) {
    // Nous prenons le contrôleur privé
    require_once "../controller/privateController.php";

// Si pas connecté
} else {
    // Nous prenons le contrôleur public
    require_once "../controller/publicController.php";
}

// Affichage de la barre de débogage
//echo '<div class="bg-white p-4 rounded shadow-sm mb-5"<hr><h3>Barre de débogage</h3><hr>';
//echo '<h4>session_id() ou SID</h4>';
//var_dump(session_id());
//echo '<h4>$_GET</h4>';
//var_dump($_GET);
//echo '<h4>$_SESSION</h4>';
//var_dump($_SESSION);
//echo '<h3>$_POST</h3>';
//var_dump($_POST);
//echo '</div>';

// Bonne pratique
$db = null;
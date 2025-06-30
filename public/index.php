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

// Bonne pratique
$db = null;
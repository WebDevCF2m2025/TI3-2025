<?php
/*
 * Contrôleur frontal (Front Controller)
 */
session_start();

// Configuration de la connexion à la base de données
require_once "../config.php";
require_once "../model/localisationsModel.php";


// Connexion PDO

try{
    // instanciation de PDO
    $db = new PDO(DB_DSN,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

    // en cas d'erreur, instanciation d'Exception
}catch(Exception $e){
    // mode production -> error_log($e->getMessage());
    die($e->getMessage());

}

// Contrôleur privé si connecté, public sinon
if (isset($_SESSION['username'])) {
    require_once "../controller/PrivateController.php";
} else {
    require_once "../controller/PublicController.php";
}

// Debug (affiché en bas de chaque page)
echo '<div style="background:#f9f9f9; border-top:2px solid #ccc; padding:1em; margin-top:2em;">';
echo '<hr><h3>🔧 Barre de débogage</h3><hr>';
echo '<h4>session_id()</h4>';
var_dump(session_id());
echo '<h4>$_GET</h4>';
var_dump($_GET);
echo '<h4>$_SESSION</h4>';
var_dump($_SESSION);
echo '<h4>$_POST</h4>';
var_dump($_POST);
echo '</div>';

// Fermeture de la connexion
$db = null;

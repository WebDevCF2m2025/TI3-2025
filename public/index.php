<?php

/*
 * Contrôleur frontal
 */

session_start();

// configuration de la connexion à la base de données
require_once "../config.php";


// notre connexion PDO
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

// Si nous sommes connectés
if(isset($_SESSION['login'])){
    require_once "../controller/PrivateController.php";
}else{
    // sinon
    require_once "../controller/PublicController.php";
}

// si nous sommes en mode dev
if(APP_MODE == "dev"):

// Affichage de la barre de débogage
    echo '<div <hr><h3>Barre de débogage</h3><hr>';
    echo '<h4>session_id() ou SID</h4>';
    var_dump(session_id());
    echo '<h4>$_GET</h4>';
    var_dump($_GET);
    echo '<h4>$_SESSION</h4>';
    var_dump($_SESSION);
    echo '<h3>$_POST</h3>';
    var_dump($_POST);
    echo '</div>';

endif;


// bonne pratique
$db = null;
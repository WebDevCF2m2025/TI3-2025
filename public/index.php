<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();



// configuration de la connexion à la base de données
require_once "../config-dev.php";


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
if(isset($_SESSION['idutilisateurs'])){
    require_once "../controller/privateController.php";
}else{
    // sinon
    require_once "../controller/publicController.php";
}

// Affichage de la barre de débogage
echo '<div class="bg-white p-4 rounded shadow-sm mb-5"<hr><h3>Barre de débogage</h3><hr>';
echo '<h4>session_id() ou SID</h4>';
var_dump(session_id());
echo '<h4>$_GET</h4>';
var_dump($_GET);
echo '<h4>$_SESSION</h4>';
var_dump($_SESSION);
echo '<h3>$_POST</h3>';
var_dump($_POST);
echo '</div>';


$db = null;
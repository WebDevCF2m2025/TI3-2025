<?php


session_start();

// configuration de la connexion à la base de données
require_once "../config.php";

echo "index";
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
    require_once "../controller/privateController.php";
}else{
    // sinon
    require_once "../controller/publicController.php";
}

var_dump($_SESSION);
$db = null;
<?php


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

if(isset($_GET['loadDatas'])){
    require_once "../model/localisationsModel.php";
    echo json_encode(getListPublished($db));
    $db = null;
    exit();
}




// Si nous sommes connectés
if(isset($_SESSION['idutilisateurs'])){
    require_once "../controller/privateController.php";
}else{
    // sinon
    require_once "../controller/publicController.php";
}




$db = null;
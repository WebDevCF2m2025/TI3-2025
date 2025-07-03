<?php
# TI3-2025/public/index.php

session_start();

require_once "../config.php";
try{
    $db = new PDO(DB_DSN,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

}catch(Exception $e){
    die($e->getMessage());
    
}

if(isset($_SESSION['idutilisateurs'])){
    require_once "../controller/privateController.php";
}else{
    require_once "../controller/publicController.php";
}

if(APP_MODE == "dev"):

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

endif;

$db = null;
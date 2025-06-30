<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg']) && $_GET['pg'] === 'admin') {

    $localisations = selectAllLocalisation($db);
    require_once "../view/private/admin.php";
} elseif (isset($_GET['pg']) && $_GET['pg'] === 'creation') {
    
    
    if (isset($_POST['nom'],$_POST['ville'])) {
        
        $insert = insertLocalisation($db, $_POST);

        if($insert){
        header('Location: ./?pg=admin');
        exit();
        } else {
            echo "error";
        }
}

    require_once "../view/private/creation.php";
} elseif (isset($_GET['pg']) && $_GET['pg'] === "disconnect") {

    if (disconnectUser()) {
        header("Location: ./");
        exit();
    }
}elseif ($_GET['pg'] === "delete" && isset($_GET['idarticle']) && ctype_digit($_GET['idarticle'])) {
        $idarticle = (int)$_GET['idarticle'];
        // suppresion de l'article dont l'id vaut $idarticle
        if (deleteArticle($db, $idarticle)) {
            header("Location: ./?pg=admin");
            exit();
        }

<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg']) && $_GET['pg'] === 'admin') {

    $localisations = selectAllLocalisation($db);

    require_once "../view/private/admin.php";

} elseif (isset($_GET['pg']) && $_GET['pg'] === 'creation') {


    if (isset($_POST['nom'], $_POST['ville'])) {

        $insert = insertLocalisation($db, $_POST);

        if ($insert) {
            header('Location: ./?pg=admin');
            exit();
        } else {
            $errorCreate="Les champs du formulaires ne sont pas valides ou ne sont pas remplis";
        }
    }

    require_once "../view/private/creation.php";

} elseif (isset($_GET['pg']) && $_GET['pg'] === "disconnect") {

    if (disconnectUser()) {
        header("Location: ./");
        exit();
    }
} elseif ($_GET['pg'] === "delete" && isset($_GET['idLocalisation']) && ctype_digit($_GET['idLocalisation'])) {
    $idLocalisation = (int)$_GET['idLocalisation'];
   
    if (deleteLocalisation($db, $idLocalisation)) {
        header("Location: ./?pg=admin");
        exit();
    }

}elseif ($_GET['pg'] === "update" && isset($_GET['idLocalisation']) && ctype_digit($_GET['idLocalisation'])) {
        $idLocalisation = (int)$_GET['idLocalisation'];

        
        if(isset(
            $_POST['nom'],
            $_POST['ville'],
            $_POST['adresse']
        )){

            $update = updateLocalisationById($db,$_POST,$_GET['idLocalisation']);
            if($update){
                header("Location: ./?pg=admin");
                exit();
            }else{
                $errorUpdate ="Les champs du formulaires ne sont pas valides ou ne sont pas remplis";
            }
        }

        $OneLocal = selectOneLocalisatoinById($db,$idLocalisation);
        require_once "../view/private/update.php";
    }

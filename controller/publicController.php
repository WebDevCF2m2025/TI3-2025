<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";



if (!isset($_GET['pg'])) {
// chargement des articles
    $localisations = selectAllLocalisation($db);

    require_once "../view/public/homepage.php";

}elseif($_GET['pg']==='json'){
    

    $localisations = selectAllLocalisation($db);
    header('Content-Type: application/json');
    echo json_encode($localisations);
    exit();
}elseif($_GET['pg']==='connexion'){

    if(isset($_POST['login'],$_POST['password'])){

        $connect = connectUser($db,$_POST['login'],$_POST['password']);

        if($connect){
            header('Location: ./?pg=admin');
            exit();
        }else{
            echo "erreur";
        }
    }
    require_once "../view/public/connexion.php";
}

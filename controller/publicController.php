<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";



if (!isset($_GET['pg'])) {
// chargement des articles
    $localisations = selectAllLocalisation($db);
// chargement du template de l'accueil
    require_once "../view/public/hompage.html.php";

}elseif ($_GET['pg']==='json'){
    $localisations = selectAllLocalisation($db);
    header('Content-Type: application/json');
    echo json_encode($localisations);
    exit();
}

// existence de pg
elseif (($_GET['pg']) === 'connect') 
      {
        if (isset($_POST['username'], $_POST['passwd'])) {
            $connect = authentificateActivedUser($db, $_POST['username'], $_POST['passwd']);
            if ($connect) {
                header("location: ./");
                exit;
           
            } else {
                $displayError = "";
                /*
                // on compte le nombre de tentatives de connexion
                // ICI options
                if(isset($_SESSION['compte'])){
                    $_SESSION['compte']++;
                    if($_SESSION['compte']>3){
                        $_SESSION['adresseip'] = $_SERVER['REMOTE_ADDR'];
                        header("Location: http://www.google.be");
                    }
                }else{
                    $_SESSION['compte']=1;
                }
                */
            }
        }
        require_once "../view/public/form.html.php";


    } elseif ($_GET['pg'] === 'login') {

        // création de variables pour ne pas afficher le succès
        // ou l'erreur de connexion
        $localisations = selectAllLocalisation($db);
        require_once "../view/private/administration.html.php";
        $displaySucces = "d-none";
        $displayError = "d-none";
        $displayForm = "";
        header('Location:./');
        exit();
        // s'il existe les 2 variables post souhaitées
        // on essaye de se connecter
        
        
    }


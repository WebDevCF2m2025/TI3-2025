<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";


if($_GET['pg']==='json'){
   
 
    $localisations = selectAllLocalisation($db);
    header('Content-Type: application/json');
    echo json_encode($localisations);
    exit();
}
 

if (!isset($_GET['pg'])) {
// chargement des articles
    $localisations = selectAllLocalisation($db);



// chargement du template de l'accueil
    require_once "../view/public/hompage.html.php";
// existence de pg
}else {
    if ($_GET['pg'] === 'about') {
        require_once "../view/about.html.php";
    } elseif ($_GET['pg'] === 'login') {
        // création de variables pour ne pas afficher le succès
        // ou l'erreur de connexion
        $displaySucces = "d-none";
        $displayError = "d-none";
        $displayForm = "";
        // s'il existe les 2 variables post souhaitées
        // on essaye de se connecter
        if (isset($_POST['login'], $_POST['userpwd'])) {
            $connect = authentificateActivedUser($db, $_POST['login'], $_POST['userpwd']);
            if ($connect) {
                // affichage du bloc de succès
                $displaySucces = "";
                // on cache le formulaire
                $displayForm = "d-none";
                // création d'un javascript
                $jsRedirect = "<script>
    setTimeout(() => {
  window.location.href = './';
}, 3000); // Redirects after 3 seconds
</script>";
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
        require_once "../view/login.html.php";
    }
}


$test = selectAllLocalisation($db);

var_dump($test);
require_once "../view/public/hompade.admin.html.php";

require_once "../view/public/hompage.html.php";
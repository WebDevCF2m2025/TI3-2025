<?php
# controller/PublicController.php


// chargement des dépendances
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

// pour charger les articles en json
if(isset($_GET['json'])) {
    $localisations = selectAllLocalisation($db);
    echo json_encode($localisations);
    exit();
}

// homepage

// non existence de pg
if (!isset($_GET['pg'])) {
// chargement des articles
    $localisations = selectAllLocalisation($db);



  // chargement du template de l'accueil
    require_once "../view/public/homepage.html.php";
// existence de pg
} else {
    
     if ($_GET['pg'] === 'login') {
        // création de variables pour ne pas afficher le succès
        // ou l'erreur de connexion
        $displaySucces = "d-none";
        $displayError = "d-none";
        $displayForm = "";
        // s'il existe les 2 variables post souhaitées
        // on essaye de se connecter
        if (isset($_POST['login'], $_POST['userpwd'])) {
            $connect = authentificateUtilisateurs($db, $_POST['login'], $_POST['userpwd']);
            if ($connect=== true) {

                  header("Location: ./?pg=admin");
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
            } else
             { $displayError = "";
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
        require_once "../view/public/login.html.php";
    }
}
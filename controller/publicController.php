<?php

echo "/publicController";
# controller/PublicController.php
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";


if(isset($_GET['pg'])){
    if($_GET['pg']==="login"){
        // création des variables qui affichent le succès/ erreur de connexion
        $displaySucces = "d-none"; // non visible par défaut
        $displayError = "d-none"; // non visible par défaut
        $displayForm = ""; // affichage du formulaire visible par défaut
        // ici tentative de connexion
        if(isset($_POST['login']) && isset($_POST['userpwd'])){
            if(connectUser($db,$_POST['login'],$_POST['userpwd'])){
                $displaySucces = ""; // succès visible
                $displayForm = "d-none"; // on cache le formulaire
                // création d'un javascript de redirection
                $jsRedirect = " <script>
                                    setTimeout(() => {
                                        window.location.href = './';
                                    }, 3000); 
                                </script>";
            }else{
                // affichage de l'erreur
                $displayError = "";
            }
        }

        // appel de la vue
        require_once "../view/public/login.php";
    }
}else {
    //chargement des articles pour l'accueil

    require_once "../view/public/homepage.php";
}

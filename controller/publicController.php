<?php
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
            // si c'est le bon utilisateur
            if(connectUser($db,$_POST['login'],$_POST['userpwd'])){
                $displaySucces = ""; // succès visible
                $displayForm = "d-none"; // on cache le formulaire
                // création d'un javascript de redirection
                $jsRedirect = "<script>
                    setTimeout(() => {
                        window.location.href = './';
                }, 3000); // Redirects after 3 seconds
                                </script>";
            }
            else{
                // affichage de l'erreur
            }
        }
        require_once "../view/public/login.html.php";
    }
}else {
        $localisations =  getLocalisationById($db);
        require_once "../view/public/home.html.php";
}
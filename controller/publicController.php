<?php

echo "/public";
# controller/PublicController.php
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";


if(isset($_GET['pg'])){
    if($_GET['pg']==="login"){
        // ici tentative de connexion
        if(isset($_POST['login']) && isset($_POST['userpwd'])){

        }

        // appel de la vue
        require_once "../view/login.php";
    }
}else {
    //chargement des articles pour l'accueil

    require_once "../view/public/homepage.php";
}

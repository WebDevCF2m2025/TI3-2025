<?php
// echo "/privateController";


# controller/PrivateController.php
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";


if (isset($_GET['pg'])) {
    // déconnexion
    if ($_GET['pg'] === "logout") {
        // appel de la fonction de déconnexion qui DOIT
        // nous envoyer un booléen (on s'assure de la synchronicité)
        // de base de PHP (voir https://amphp.org/ ou https://reactphp.org/http/) / ou problème de surcharge réseau
        if (disconnectUser())
            // redirection
            header("Location: ./");
        exit();

    } elseif ($_GET['pg'] === "adminR") {
        //chargement des articles pour l'administration
        $lists = getListPublished($db);

        // appel de la vue
        require_once "../view/private/adminR.php";
    } elseif ($_GET['pg'] === "delete" && isset($_GET['id']) && ctype_digit($_GET['id'])) {

        // on convertit le string en int
        // settype($_GET['id'],"integer");


        //suppression d'un article
        if (deleteArticleById($db, $_GET['id'])) {
            header("Location: ./?pg=adminR");
            exit();
        }
        // on souhaite ajouter un article
    } elseif ($_GET['pg'] === "adminC") {
        // si les variables de type post attendues sont là
        if (isset($_POST['latitude'], $_POST['longitude'])) {
            $insert = addAdresse($db, $_POST);
            if ($insert === true) {
                $merci = true;
            } else {
                $probleme = true;
            }
        }
        // appel de la vue
        require_once "../view/private/adminC.php";

        // on souhaite modifier un article qu'on récupère grâce à
        // son identifiant qui doit être un string contenant que des entiers [0-9]+
    } elseif ($_GET['pg'] === "adminU" && isset($_GET['id']) && ctype_digit($_GET['id'])) {
       
        $displayForm = ""; // le formulaire est affiché
        // on va convertir l'id en entier
        $idadresse = (int) $_GET['id'];
        $adresseU = getOneAdresseById($db, $idadresse);

        if($article===false) $error = "Cet article n'existe plus";

        // si les variables de type post attendues sont là
        if (isset($_POST['nom'], $_POST['adresse'])) {
           $update = updateAdresseById($db, $_POST);
            if ($update === true) {
                $merci = true;
                $displayForm = "d-none"; // on cache le formulaire
            } else {
                $error = "Erreur lors de la modification d'un adresse";
            }
        }
        // appel de la vue
        require_once "../view/private/adminU.php";
    }

} else {
    //chargement des articles pour l'accueil
    $navActive = true;
    $lists = getListPublished($db);
    require_once "../view/public/homepage.php";
}


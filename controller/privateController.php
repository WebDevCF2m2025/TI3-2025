<?php
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
        // page à propos
    } elseif ($_GET['pg'] === "admin") {
        //chargement des articles pour l'administration
        $articles = getAllArticles($db);
        // appel de la vue
        require_once "../view/admin.homepage.html.php";
    } elseif ($_GET['pg'] === "delete"
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        // on convertit le string en int
        // settype($_GET['id'],"integer");
        $idarticle = (int)$_GET['id'];

        //suppression d'un article
        if (deleteArticleById($db, $idarticle)) {
            header("Location: ./?pg=admin");
            exit();
        }
        // on souhaite ajouter un article
    } elseif ($_GET['pg'] === "addArticle") {
        // si les variables de type post attendues sont là
        if (isset($_POST['title'], $_POST['articletext'])) {
            $insert = addArticle($db, $_POST);
            if ($insert === true) {
                $merci = true;
            } else {
                $probleme = true;
            }
        }
        // appel de la vue
        require_once "../view/admin.insert.html.php";

        // on souhaite modifier un article qu'on récupère grâce à
        // son identifiant qui doit être un string contenant que des entiers [0-9]+
    } elseif ($_GET['pg'] === "update"
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        $displayForm = ""; // le formulaire est affiché
        // on va convertir l'id en entier
        $idarticle = (int) $_GET['id'];
        $article = getOneArticleById($db, $idarticle);

        if($article===false) $error = "Cet article n'existe plus";

        // si les variables de type post attendues sont là
        if (isset($_POST['title'], $_POST['articletext'])) {
           $update = updateArticleById($db, $_POST);
            if ($update === true) {
                $merci = true;
                $displayForm = "d-none"; // on cache le formulaire
            } else {
                $error = "Erreur lors de la modification d'un article";
            }
        }
        // appel de la vue
        require_once "../view/admin.update.html.php";
    }

} else {
    //chargement des articles pour l'accueil
    $articles = getArticlesPublished($db);
    require_once "../view/homepage.html.php";
}


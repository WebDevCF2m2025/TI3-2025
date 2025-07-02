<?php
# controller/PrivateController.php
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
        // on a cliqué sur disconnect
     if ($_GET['pg'] === 'disconnect') {
        // si la déconnexion a réussi
        if (disconnectActivedUser()) {
            // redirection
            header("Location: ./");
            exit();
        }
        // on a cliqué sur admin
    } if ($_GET['pg'] === "admin") {
        // chargement des tous les articles
        $localisations = selectAllLocalisation($db);
        // chargement du template de l'accueil de l'administration
        require_once "../view/private/admin.homepage.html.php";
        // suppression d'un article (ctype_digit vérifie qu'un string ne contient que
        // du numérique [0-9]
    } elseif ($_GET['pg'] === "delete" && isset($_GET['idlocalisation']) && ctype_digit($_GET['idlocalisation'])) {
        $localisation = (int)$_GET['idlocalisation'];
        // suppresion de l'article dont l'id vaut $idarticle
        if (deleteLocalisation($db, $localisation)) {
            header("Location: ./?pg=admin");
            exit();
        }

        // on veut modifier l'article
    } elseif ($_GET['pg'] === "update" && isset($_GET['idlocalisation']) && ctype_digit($_GET['idlocalisation'])) {
        $localisation = (int)$_GET['idlocalisation'];
        // A FAIRE
        $displaySucces = "d-none";
        $displayError = "d-none";
        $displayForm = "";

        $localisation = selectOneLocalisationById($db,$localisation);
        $users = selectAllUser($db);


        // on a envoyé le formulaire
        if(isset(
            $_POST['nom'],
            $_POST['adresse'],
                        $_POST['latitude'],
            $_POST['longitude']
        )){

            $updateForm = updateLocalisationById($db,$_POST,$_GET['idlocalisation']);
        }

    
        // var_dump($users);

        require_once "../view/private/admin.update.html.php";

        // on veut créer un nouvel article
    } elseif ($_GET['pg'] === "new") {
        // création de variables pour ne pas afficher le succès
        // ou l'erreur d'insertion
        $displaySucces = "d-none";
        $displayError = "d-none";
        $displayForm = "";
        // si on a envoyé le formulaire pour insérer un article
        if (isset($_POST['nom'], $_POST['adresse'])) {

            // id de l'utilisateur connexté
            $myId = $_SESSION['username'];
            $insert = insertlocalisation($db, $_POST);
            if ($insert) {
                // affichage du bloc de succès
                $displaySucces = "";
                // on cache le formulaire
                $displayForm = "d-none";
                // création d'un javascript
                $jsRedirect = "<script>
    setTimeout(() => {
  window.location.href = './?pg=admin';
}, 3000); // Redirects after 3 seconds
</script>";
            } else {
                $displayError = "";
            }

        }

       require_once "../view/private/admin.insert.html.php";

    }
}

<?php
# controller/PrivateController.php
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg'])) {
    // déconnexion
    if ($_GET['pg'] === "logout") {
        if (disconnectUser())
            header("Location: ./");
        exit();

        // accueil de l'administration
    } elseif ($_GET['pg'] === "admin") {
        $localisations = getAllLocalisations($db);
        require_once "../view/private/login.html.php";

        // suppression d'une localisation
    } elseif ($_GET['pg'] === "delete"
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        $id = (int)$_GET['id'];

        if (deleteLocalisationById($db, $id)) {
            header("Location: ./?pg=admin");
            exit();
        }

        // ajout d'une localisation
    } elseif ($_GET['pg'] === "addLocation") {
        if (isset($_POST['rue'], $_POST['codepostal'], $_POST['ville'], $_POST['latitude'], $_POST['longitude'])) {
            $insert = addLocalisation($db, $_POST);
            if ($insert === true) {
                $merci = true;
            } else {
                $probleme = true;
            }
        }
        require_once "../view/private/login.html.php";

        // mise à jour d'une localisation
    } elseif ($_GET['pg'] === "update"
        && isset($_GET['id'])
        && ctype_digit($_GET['id'])) {

        $displayForm = "";
        $id = (int) $_GET['id'];
        $localisations = getLocalisationById($db);

        if ($localisation === false) $error = "Cette localisation n'existe plus";

        if (isset($_POST['rue'], $_POST['codepostal'], $_POST['ville'], $_POST['latitude'], $_POST['longitude'])) {
            $_POST['id'] = $id; // on s'assure que l'ID est présent
            $update = updateLocalisationById($db, $_POST);
            if ($update === true) {
                $merci = true;
                $displayForm = "d-none";
            } else {
                $error = "Erreur lors de la modification de la localisation";
            }
        }
        require_once "../view/login.html.php";
    }

} else {
    // accueil public
    $localisations =  getLocalisationById($db);
    require_once "../view/public/home.html.php";
}

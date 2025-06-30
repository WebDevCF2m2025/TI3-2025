<?php

# controller/PrivateController.php
// chargement des dépendances
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

// homepage

// non existence de pg
if (!isset($_GET['pg'])) {
    // chargement des articles
    $localisations= selectAllLocalisations($db);

    // chargement du template de l'accueil
     require_once "../view//private/admin.homepage.html.php";
// existence de pg
}elseif ($_GET['pg'] === "new") {
       
// création de variables pour ne pas afficher le succès
        // ou l'erreur d'insertion
        $displaySucces = "d-none";
        $displayError = "d-none";
        $displayForm = "";
        // si on a envoyé le formulaire pour insérer un article
        if (isset($_POST['nom'], $_POST['adresse'])) {

         
            $insert = insertLocalisations($db, $_POST);
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
        require_once "../view//private/admin.insert.html.php";

    }elseif ($_GET['pg'] === "delete" && isset($_GET['idlocalisation']) && ctype_digit($_GET['idlocalisation'])) {
        $idarticle = (int)$_GET['idlocalisation'];
        // suppresion de l'article dont l'id vaut $idarticle
        if (deleteLocalisations($db, $idarticle)) {
            header("Location: ./");
            exit();
        }
}

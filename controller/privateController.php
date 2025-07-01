<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg'])) {
  if ($_GET['pg'] === "logout") {
    if (disconnectUser())
      header("Location: ./");
    exit();
  } elseif ($_GET['pg'] === "admin") {
   // $markers = getAllMarkers($db);
    require_once "../view/private/admin.accueil.html.php";
  } elseif ($_GET['pg'] === "delete" && isset($_GET['id']) && ctype_digit($_GET['id'])) {
    // convertit le string en int
    $idmarker = (int)$_GET['id'];
    // suppression d'un marqueur
    if (deleteMarkerById($db, $idmarker)) {
      header("Location: ./?pg=accueil");
      exit();
    }
  } elseif ($_GET['pg'] === "addMarker") {
    // si les variables de type post attendues sont là
    if (isset($_POST['nom'], $_POST['adresse'], $_POST['latitude'], $_POST['longitude'])) {
      $insert = addMarker($db, $_POST);
      if ($insert === true) {
        echo "ok";
      } else {
        $error = true;
      }
    }
    // appel de la vue
    require_once "../view/private/admin.insert.html.php";

  } elseif ($_GET['pg'] === "update" && isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $displayForm = ""; // le formulaire est affiché
    // convertir l'id en entier
    $idmarker = (int)$_GET['id'];
    // on récupère le marqueur
    $marker = getOneMarkerById($db, $idmarker);

    if ($marker === false) $error = "Ce marqueur n'existe plus";

    // si les variables de type post attendues sont là
    if (isset($_POST['id'],$_POST['nom'], $_POST['adresse'], $_POST['latitude'], $_POST['longitude'])) {
      // on met à jour le marqueur
      $update = updateMarkerById($db, $_POST['id'], $_POST['nom'], $_POST['adresse'], $_POST['latitude'], $_POST['longitude']);
      if ($update === true) {
        header("Location: ./?pg=admin");
        $merci = true;
        $displayForm = "d-none"; 
      } else {
        $error = "Erreur lors de la modification d'un article";
      }
    }
    // appel de la vue
    require_once "../view/private/admin.update.html.php";
  }
} else {

  // $marker = getAllMarkers($db);
  require_once "../view/public/accueil.html.php";

}
echo "SUR LE PRIVATE";
 
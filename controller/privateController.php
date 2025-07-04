<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

$listes = getLocalisationsPublished($db);
if (isset($_GET['listjs'])){
  echo json_encode($listes); 
  exit();
}

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
      header("Location: ./?pg=admin");
      exit();
    }
  } elseif ($_GET['pg'] === "addMarker") {
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
    require_once "../view/private/admin.insert.html.php";


  } elseif ($_GET['pg'] === "update" && isset($_GET['id']) && ctype_digit($_GET['id'])) {
            
 
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
    require_once "../view/private/admin.update.html.php";
}
} else {

  // $marker = getAllMarkers($db);

  require_once "../view/public/accueil.html.php";

}


echo "SUR LE PRIVATE";
 
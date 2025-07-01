<?php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg'])) {
  if ($_GET['pg'] === "logout") {
    if (disconnectUser())
      header("Location: ./");
    exit();
  } elseif ($_GET['pg'] === "admin") {
    # PAGINATION

    if(
      isset($_GET[PAGINATION_GET])
      &&ctype_digit($_GET[PAGINATION_GET])
      &&!empty($_GET[PAGINATION_GET])
    ){
      $page = (int) $_GET[PAGINATION_GET];
    } else {
      $page = 1;
    }

// compte total marqueurs
    $nbMarkers = countMarkers($db);

# on récupère la pagination
    $pagination = pagination($nbMarkers, PAGINATION_GET, $page, PAGINATION_NB);
// offset pour la requête SQL
    $offset = ($page - 1) * PAGINATION_NB;
// récupération des marqueurs
    $marks = getMarkerPagination($db, $offset, PAGINATION_NB);


    require_once "../view/private/admin.homepage.html.php";
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
    if (isset($_POST['nom'], $_POST['adresse'] ,$_POST['codepostal'], $_POST['ville'],$_POST['nb_velos'], $_POST['latitude'], $_POST['longitude'])) {
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
    if (isset($_POST['id'],$_POST['nom'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['nb_velos'] ,
      $_POST['latitude'], $_POST['longitude'])) {
      // on met à jour le marqueur
      $update = updateMarkerById($db, $_POST['id'], $_POST['nom'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['nb_velos'],
        $_POST['latitude'], $_POST['longitude']);
      if ($update === true) {
        header("Location: ./?pg=admin");
        $merci = true;
        $displayForm = "d-none"; // on cache le formulaire
      } else {
        $error = "Erreur lors de la modification d'un article";
      }
    }
    // appel de la vue
    require_once "../view/private/admin.update.html.php";
  }
} else {

  // $marker = getAllMarkers($db);
  require_once "../view/public/homepage.html.php";

}
echo "Hello from PrivateCon @troller!";
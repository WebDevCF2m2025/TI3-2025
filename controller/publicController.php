<?php
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if(isset($_GET['pg'])){
  if($_GET['pg'] === "login"){
    // création des variables qui affichent le succès/ erreur de connexion
    $displaySuces = "d-none"; // non visible par défaut
    $displayError = "d-none"; // non visible par défaut
    $displayForm = ""; // affichage du formulaire visible par défaut

    //tentative de connexion
    if(isset($_POST['username']) && isset($_POST['passwd'])){
      // si c'est le bon utilisateur
      if(connectUser($db, $_POST['username'], $_POST['passwd'])){
        $displaySuces = ""; // succès visible
        $displayForm = "d-none"; // on cache le formulaire
        // création d'un javascript de redirection
        $jsRedirect = "<script>
          setTimeout(() => {
            window.location.href = './';
          }, 3000); // Redirects after 3 seconds
        </script>";
      } else {
        // affichage de l'erreur
        $displayError = "";
      }
    }
    // appel de la vue
    require_once "../view/public/login.html.php";
  }
}else{
  // chargement du marqueur pour la carte
  $markers = getAllMarkers($db);
  // si on veut récupérer les marqueurs en json
  if (isset($_GET['getjson'])) {
    $markers = getAllMarkers($db);
    header('Content-Type: application/json');
    echo json_encode($markers);
    exit();
  }else {
    require_once "../view/public/homepage.html.php";
  }
}

echo "Hello from PublicController!";
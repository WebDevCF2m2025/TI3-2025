<?php

require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";
// pour charger les articles en json
if (isset($_GET['json'])) {
    $localisations = selectAllFromLocalisations($db);
    echo json_encode($localisations);
    exit();
}



if (isset($_GET['page']) && $_GET['page'] === 'login') {

    $displaySucces = "d-none";
    $displayError = "d-none";
    $displayForm = "";
    $error = null;
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $conected = authentificateActivedUser($db, $login, $password);

        if ($conected === true) {
            $displayForm = "d-none";
            $jsRedirect = "<script>
    setTimeout(() => {
  window.location.href = './?pg=admin';
}, 2000); // Redirects after 2 seconds
</script>";
            // header("Location: ./?page=admin");

        } else {
            $error = "Login failed  try again.";
        }
    }
    require_once "../view/public/login.php";
    exit;
}

require_once "../view/public/home.php";
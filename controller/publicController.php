<?php
# controller/PublicController.php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg']) && $_GET['pg'] === "username") {
    // logique avtorisation
    $displaySucces = "d-none";
    $displayError = "d-none";
    $displayForm = "";

    if (isset($_POST['username']) && isset($_POST['passwd'])) {
        if (connectUser($db, $_POST['username'], $_POST['passwd'])) {
            $displaySucces = "";
            $displayForm = "d-none";
            $jsRedirect = "<script>
                setTimeout(() => {
                    window.location.href = './';
                }, 3000);
            </script>";
        } else {
            $displayError = "";
        }
    }

    require_once "../view/public/login.php";
} else {
    // Home
    $locations = getAllLocations($db);
    $jlocations = json_encode($locations);
    require_once "../view/public/home.php";
}


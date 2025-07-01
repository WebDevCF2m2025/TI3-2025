<?php
# TI3-2025/controller/PublicController.php

require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";

if (isset($_GET['pg'])) {
    if ($_GET['pg'] === "login") {
        $displaySuccess = "d-none";
        $displayError = "d-none";
        $displayForm = "";
        $jsRedirect = "";

        if (isset($_POST['username']) && isset($_POST['passwd'])) {
            if (connectUtilisateur($db, $_POST['username'], $_POST['passwd'])) {
                $displaySuccess = "";
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

        require_once "../view/public/login.html.php";
    }
} else {
    $localisations = getAllLocalisations($db);

    if (isset($_GET['getjson'])) {
        echo json_encode($localisations);
    } else {
        require_once "../view/public/homePage.html.php";
    }
}

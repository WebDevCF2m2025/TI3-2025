<?php
# controller/privateController.php
 
require_once "../model/localisationsModel.php";
require_once "../model/utilisateursModel.php";
 
$ret = "<script>
                setTimeout(() => {
                    window.location.href = './?action=list';
                }, 2000);
            </script>";

$action = $_GET['action'] ?? 'list';
 
switch ($action) {
    case 'list':
        
        $locations = getAllLocations($db);
        require_once "../view/private/locationList.php";
        break;
        
    case 'add':
        
        $errors = [];
        $success = "";
        
        if ($_POST) {
            $nom = strip_tags(trim($_POST['nom'] ?? ''));
            $adresse = strip_tags(trim($_POST['adresse'] ?? ''));
            $codepostal = strip_tags(trim($_POST['codepostal'] ?? ''));
            $latitude = strip_tags(trim($_POST['latitude'] ?? ''));
            $longitude = strip_tags(trim($_POST['longitude'] ?? ''));
            
            
            if (empty($nom)) $errors[] = "Le nom est requis";
            if (empty($adresse)) $errors[] = "L'adresse est requise";
            if (empty($codepostal)) $errors[] = "Le code postal est requis";
            if (empty($latitude) || !is_numeric($latitude)) $errors[] = "Latitude invalide";
            if (empty($longitude) || !is_numeric($longitude)) $errors[] = "Longitude invalide";
            
            if (empty($errors)) {
                if (addLocation($db, $nom, $adresse, $codepostal, $latitude, $longitude)) {
                    $success = "Localisation ajoutée avec succès!";
                    echo($ret);
                    $_POST = [];
                } else {
                    $errors[] = "Erreur lors de l'ajout";
                }
            }
        }
        
        require_once "../view/private/addLocation.php";
        break;
        
    case 'edit':
        
        $id = $_GET['id'] ?? 0;
        $errors = [];
        $success = "";
        
        if (!$id) {
            header("Location: ./?action=list");
            exit;
        }
        
        if ($_POST) {
            $nom = strip_tags(trim($_POST['nom'] ?? ''));
            $adresse = strip_tags(trim($_POST['adresse'] ?? ''));
            $codepostal = strip_tags(trim($_POST['codepostal'] ?? ''));
            $latitude = strip_tags(trim($_POST['latitude'] ?? ''));
            $longitude = strip_tags(trim($_POST['longitude'] ?? ''));
            
            
            if (empty($nom)) $errors[] = "Le nom est requis";
            if (empty($adresse)) $errors[] = "L'adresse est requise";
            if (empty($codepostal)) $errors[] = "Le code postal est requis";
            if (empty($latitude) || !is_numeric($latitude)) $errors[] = "Latitude invalide";
            if (empty($longitude) || !is_numeric($longitude)) $errors[] = "Longitude invalide";
            
            if (empty($errors)) {
                if (updateLocation($db, $id, $nom, $adresse, $codepostal, $latitude, $longitude)) {
                    $success = "Localisation modifiée avec succès!";
                    echo($ret);
                } else {
                    $errors[] = "Erreur lors de la modification";
                }
            }
        }
        
        $location = getLocationById($db, $id);
        if (!$location) {
            header("Location: ./?action=list");
            exit;
        }
        
        require_once "../view/private/editLocation.php";
        break;
        
    case 'delete':
        
        $id = $_GET['id'] ?? 0;
        
        if ($id && deleteLocation($db, $id)) {
            header("Location: ./?action=list&deleted=1");
        } else {
            header("Location: ./?action=list&error=1");
        }
        exit;
        
        
    case 'logout':
        
        if (disconnectUser()) {
            header("Location: ./");
            exit;
        }
        break;
        
    default:
      
        $locations = getAllLocations($db);
        require_once "../view/private/locationsList.php";
        break;
}

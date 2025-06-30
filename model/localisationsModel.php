<?php
# TI3-2025-Sam/model/localisationsModel.php
/*
 *  CRUD
 */

/*
 * CREATE
 */
/**
 * @param PDO $connect
 * @param array $datas
 * @return bool
 */
function addLoc(PDO $connect, array $datas): bool
{
    // Vérifications
    $nom = htmlspecialchars(trim(strip_tags($datas["nom"])));
    $adresse = htmlspecialchars(trim(strip_tags($datas["adresse"])));
    $ville = htmlspecialchars(trim(strip_tags($datas["ville"])));
    $numero = htmlspecialchars(strip_tags(trim($datas['numero'])));

    $codepostal = trim($datas["codepostal"]);
    $latitude = (float)$datas["latitude"];
    $longitude = (float)$datas["longitude"];


    // Vérification de la présence
    if (empty($nom) || empty($adresse) || empty($ville)  || empty($numero) || empty($codepostal))
        return false;

    if (!isset($datas["latitude"]) || !isset($datas["longitude"]) || !is_numeric($datas["latitude"]) || !is_numeric($datas["longitude"])) {
        return false;
    }

    // Vérification des longueurs maximum selon la DB
    if (
        strlen($nom) > 30 ||
        strlen($adresse) > 100 ||
        strlen($numero) > 10 ||
        strlen($ville) > 20 ||
        strlen($codepostal) > 4
    ) {
        return false;
    }

    // Vérifications minimum/maximum (latitude-longitude)
    if ($latitude < -90 || $latitude > 90 || $longitude < -180 || $longitude > 180) {
        return false;
    }

    $sql = "INSERT INTO localisations (nom, adresse, ville, numero, codepostal, latitude, longitude) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $prepare = $connect -> prepare($sql);
    try {
        $prepare->execute([$nom, $adresse, $ville, $numero, $codepostal, $latitude, $longitude]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}



/*
 * READ
 */
/**
 * @param PDO $connect
 * @return array
 */
// Fonction pour récupérer les localisations
function getLocalisations(PDO $connect): array {
    $sql  = " SELECT * FROM localisations ";
    try{
        $query = $connect->query($sql);
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    } catch (Exception $e){
        die($e->getMessage());
    }
}


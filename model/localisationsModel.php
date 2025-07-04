<?php
/**
 * @param PDO $db
 * @return array
 */


function selectAllFromLocalisations(PDO $db): array
{
    $sql = "
    SELECT * FROM `localisations`;
    ";

    try {
        $query = $db->query($sql);
        $res = $query->fetchAll();
        $query->closeCursor();
        return $res;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function insertLocalisation(PDO $db, $localisation)
{
    $nom = htmlspecialchars((trim($localisation['nom'])), ENT_QUOTES);
    $adresse = htmlspecialchars(trim($localisation['adresse']), ENT_QUOTES);
    $codepostal = htmlspecialchars(trim(strip_tags($localisation['codepostal'])), ENT_QUOTES);
    $ville = htmlspecialchars(trim(strip_tags($localisation['ville'])), ENT_QUOTES);
    $latitude = (float) $localisation['latitude'];
    $longitude = htmlspecialchars(trim(strip_tags($localisation['longitude'])), ENT_QUOTES);


    if (empty($nom) || strlen($nom) > 50 || empty($adresse) || strlen($adresse) > 50 || empty($codepostal) || strlen($codepostal) !== 4 || empty($ville) || strlen($ville) > 30 || empty($latitude) || strlen($latitude) > 15 || strlen($latitude) < 1 || empty($longitude) || strlen($longitude) > 15) {
        return false;
    }

    $sql = "INSERT INTO localisations (nom, adresse, codepostal, ville, latitude, longitude)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    try {
        $stmt->execute([$nom, $adresse, $codepostal, $ville, $latitude, $longitude]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }


}

function deleteLocalisationById(PDO $db, $id)
{
    $stmt = $db->prepare("DELETE FROM localisations WHERE id = ?");
    $stmt->execute([$id]);
}

function updateLocalisationById(PDO $db, $localisation, int $id)
{
    $sql = "UPDATE `localisations` SET `nom`= :nom,
                   `adresse`= :adresse,
                   `codepostal` = :codepostal,
                   `ville` = :ville,
                   `latitude` = :latitude,
                   `longitude` = :longitude
                   WHERE `id`= :id";



    $nom = htmlspecialchars(trim(strip_tags($localisation['nom'])), ENT_QUOTES);
    $adresse = htmlspecialchars(trim(strip_tags($localisation['adresse'])), ENT_QUOTES);
    $codepostal = (int) trim($localisation['codepostal']);
    $ville = htmlspecialchars(trim(strip_tags($localisation['ville'])), ENT_QUOTES);
    $latitude = (float) trim($localisation['latitude']);
    $longitude = (float) trim($localisation['longitude']);

    if (
        empty($nom) ||
        empty($adresse) ||
        empty($ville) ||
        empty($codepostal) ||
        strlen($nom) > 100 ||
        strlen($adresse) > 100 ||
        empty($latitude) ||
        empty($longitude)
    ) {
        return false;
    }

    $stmt = $db->prepare($sql);
    try {
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':adresse', $adresse);
        $stmt->bindValue(':codepostal', $codepostal);
        $stmt->bindValue(':ville', $ville);
        $stmt->bindValue(':latitude', $latitude);
        $stmt->bindValue(':longitude', $longitude);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());


    }
}

function selectLocalisationById(PDO $db, $id)
{
    $stmt = $db->prepare("SELECT * FROM localisations WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
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

function insertLocalisation(PDO $db, $nom, $adresse, $codepostal, $ville, $latitude, $longitude)
{
    $sql = "INSERT INTO localisations (nom, adresse, codepostal, ville, latitude, longitude)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nom, $adresse, $codepostal, $ville, $latitude, $longitude]);
}
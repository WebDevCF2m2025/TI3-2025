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

function deleteLocalisationById(PDO $db, $id)
{
    $stmt = $db->prepare("DELETE FROM localisations WHERE id = ?");
    $stmt->execute([$id]);
}

function updateLocalisationById(PDO $db, $id, $nom, $adresse, $codepostal, $ville, $latitude, $longitude)
{
    $sql = "UPDATE localisations SET nom=?, adresse=?, codepostal=?, ville=?, latitude=?, longitude=? WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nom, $adresse, $codepostal, $ville, $latitude, $longitude, $id]);
}

function selectLocalisationById(PDO $db, $id)
{
    $stmt = $db->prepare("SELECT * FROM localisations WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
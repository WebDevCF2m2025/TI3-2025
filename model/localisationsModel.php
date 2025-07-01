<?php
# model/localisationsModel.php

/**
 * Récupère toutes les localisations
 * @param PDO $connect
 * @return array
 */
function getAllLocalisations(PDO $connect): array
{
    $sql = "SELECT * FROM localisations ORDER BY ville ASC, rue ASC";
    $stmt = $connect->prepare($sql);
    try {
        $stmt->execute();
        $results = $stmt->fetchAll();
        $stmt->closeCursor();
        return $results;
    } catch (Exception $e) {
        die("Erreur lors de la récupération des localisations : " . $e->getMessage());
    }
}

/**
 * Récupère une localisation par son ID
 * @param PDO $connect
 * @param int $id
 * @return array|bool
 */
function  getLocalisationById(PDO $connect): array
{
    $request = $connect->prepare("SELECT * FROM `localisations`");
    try {
        $request->execute();
        $results = $request->fetchAll();
        $request->closeCursor();
        return $results;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * Ajoute une nouvelle localisation
 * @param PDO $connect
 * @param array $data
 * @return bool
 */
function addLocalisation(PDO $connect, array $data): bool
{
    // Nettoyage
    $rue = htmlspecialchars(trim($data['rue']));
    $codepostal = htmlspecialchars(trim($data['codepostal']));
    $ville = htmlspecialchars(trim($data['ville']));
    $latitude = (float)$data['latitude'];
    $longitude = (float)$data['longitude'];

    if (empty($rue) || empty($codepostal) || empty($ville)) return false;

    $sql = "INSERT INTO localisations (rue, codepostal, ville, latitude, longitude) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    try {
        $stmt->execute([$rue, $codepostal, $ville, $latitude, $longitude]);
        $stmt->closeCursor();
        return true;
    } catch (Exception $e) {
        die("Erreur lors de l'ajout : " . $e->getMessage());
    }
}

/**
 * Met à jour une localisation existante
 * @param PDO $connect
 * @param array $data
 * @return bool
 */
function updateLocalisationById(PDO $connect, array $data): bool
{
    $id = (int)$data['id'];
    $rue = htmlspecialchars(trim($data['rue']));
    $codepostal = htmlspecialchars(trim($data['codepostal']));
    $ville = htmlspecialchars(trim($data['ville']));
    $latitude = (float)$data['latitude'];
    $longitude = (float)$data['longitude'];

    if (empty($id) || empty($rue) || empty($codepostal) || empty($ville)) return false;

    $sql = "UPDATE localisations 
            SET rue = ?, codepostal = ?, ville = ?, latitude = ?, longitude = ?
            WHERE id = ?";
    $stmt = $connect->prepare($sql);
    try {
        $stmt->execute([$rue, $codepostal, $ville, $latitude, $longitude, $id]);
        $stmt->closeCursor();
        return true;
    } catch (Exception $e) {
        die("Erreur lors de la mise à jour : " . $e->getMessage());
    }
}

/**
 * Supprime une localisation
 * @param PDO $connect
 * @param int $id
 * @return bool
 */
function deleteLocalisationById(PDO $connect, int $id): bool
{
    $sql = "DELETE FROM localisations WHERE id = ?";
    $stmt = $connect->prepare($sql);
    try {
        $stmt->execute([$id]);
        $stmt->closeCursor();
        return true;
    } catch (Exception $e) {
        die("Erreur lors de la suppression : " . $e->getMessage());
    }
}

<?php

/**
 * Recupère toutes les locations
 * @param PDO $connexion
 * @return array|false
 */
function getAllLocations(PDO $pdo): array|false
{
    try {
        $sql = "SELECT * FROM localisations
ORDER BY id ASC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $locations = $stmt->fetchAll();

        if ($locations) {
            return $locations;
        }

        return false;
    } catch (PDOException $e) {
        $e->getMessage();
        return false;
    }
}

/**
 * Supprime un article
 * @param PDO $connexion
 * @param int $id
 * @return bool
 */
function deleteArticle(PDO $pdo, int $id): bool
{
    // requête préparée
    $sql = "DELETE FROM `localisations` WHERE `id`=?";
    $prepare = $pdo->prepare($sql);
    try {
        $prepare->execute([$id]);
        $prepare->closeCursor();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

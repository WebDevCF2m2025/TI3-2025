<?php
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

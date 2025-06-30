<?php
function getAllLocations(PDO $pdo): array|false
{
    try {
        $sql = "SELECT * FROM localisations";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $locations = $stmt->fetchAll();

        if ($locations) {
            return $locations;
        }

        return false;
    } catch (PDOException $e) {
        error_log("Erreur PDO dans getAllLocations : " . $e->getMessage());
        return false;
    }
}

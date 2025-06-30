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
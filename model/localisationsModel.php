<?php

/**
 * Recupère toutes les locations
 * @param PDO $connexion
 * @return array|false
 */
function getAllLocations(PDO $pdo): array|false
{
    try {
        $sql = "SELECT * FROM localisations ORDER BY id ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $locations = $stmt->fetchAll();
        return $locations ?: false;
    } catch (PDOException $e) {
        error_log("Erreur getAllLocations : " . $e->getMessage());
        return false;
    }
}

function getLocationById(PDO $db, int $id): array|false
{
    if ($id <= 0) return false;

    try {
        $stmt = $db->prepare("SELECT * FROM localisations WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: false;
    } catch (PDOException $e) {
        error_log("Erreur getLocationById : " . $e->getMessage());
        return false;
    }
}

/**
 * Supprime un article
 * @param PDO $connexion
 * @param int $id
 * @return bool
 */
function deleteLocationById(PDO $pdo, int $id): bool
{

    try {
        $sql = "DELETE FROM localisations WHERE id = ?";
        $prepare = $pdo->prepare($sql);
        $prepare->execute([$id]);
        $prepare->closeCursor();
        return true;
    } catch (Exception $e) {
        error_log("Erreur deleteLocationById : " . $e->getMessage());
        return false;
    }
}
function addLocation(PDO $connection, array $datas): bool
{
    // Vérification des champs requis
    $required = ['nom', 'adresse', 'codepostal', 'ville', 'nb_velos', 'latitude', 'longitude'];
    foreach ($required as $field) {
        if (!isset($datas[$field]) || trim($datas[$field]) === '') {
            return false;
        }
    }

    // Nettoyage des données
    $nom = htmlspecialchars(strip_tags(trim($datas['nom'])));
    $adresse = htmlspecialchars(strip_tags(trim($datas['adresse'])));
    $codepostal = htmlspecialchars(strip_tags(trim($datas['codepostal'])));
    $ville = htmlspecialchars(strip_tags(trim($datas['ville'])));
    $nb_velos = (int) $datas['nb_velos'];
    $latitude = htmlspecialchars(strip_tags(trim($datas['latitude'])));
    $longitude = htmlspecialchars(strip_tags(trim($datas['longitude'])));

    $sql = "INSERT INTO localisations 
            (nom, adresse, codepostal, ville, nb_velos, latitude, longitude)
            VALUES 
            (:nom, :adresse, :codepostal, :ville, :nb_velos, :latitude, :longitude)";

    try {
        $prepare = $connection->prepare($sql);
        $prepare->bindValue("nom", $nom);
        $prepare->bindValue("adresse", $adresse);
        $prepare->bindValue("codepostal", $codepostal);
        $prepare->bindValue("ville", $ville);
        $prepare->bindValue("nb_velos", $nb_velos, PDO::PARAM_INT);
        $prepare->bindValue("latitude", $latitude);
        $prepare->bindValue("longitude", $longitude);
        $prepare->execute();
        return true;
    } catch (Exception $e) {
        error_log("Erreur addLocation : " . $e->getMessage());
        return false;
    }
}

function updateLocationById(PDO $connection, array $datas, int $idLocation): bool
{


    // Nettoyage des données
    $nom = htmlspecialchars(strip_tags(trim($datas['nom'])));
    $adresse = htmlspecialchars(strip_tags(trim($datas['adresse'])));
    $codepostal = htmlspecialchars(strip_tags(trim($datas['codepostal'])));
    $ville = htmlspecialchars(strip_tags(trim($datas['ville'])));
    $nb_velos = (int) $datas['nb_velos'];
    $latitude = htmlspecialchars(strip_tags(trim($datas['latitude'])));
    $longitude = htmlspecialchars(strip_tags(trim($datas['longitude'])));

    $sql = "UPDATE localisations SET 
                nom = :nom,
                adresse = :adresse,
                codepostal = :codepostal,
                ville = :ville,
                nb_velos = :nb_velos,
                latitude = :latitude,
                longitude = :longitude
            WHERE id = :id";

    try {
        $prepare = $connection->prepare($sql);
        $prepare->bindValue("id", $idLocation, PDO::PARAM_INT);
        $prepare->bindValue("nom", $nom);
        $prepare->bindValue("adresse", $adresse);
        $prepare->bindValue("codepostal", $codepostal);
        $prepare->bindValue("ville", $ville);
        $prepare->bindValue("nb_velos", $nb_velos, PDO::PARAM_INT);
        $prepare->bindValue("latitude", $latitude);
        $prepare->bindValue("longitude", $longitude);
        $prepare->execute();
        return true;
    } catch (Exception $e) {
        error_log("Erreur updateLocationById : " . $e->getMessage());
        return false;
    }
}

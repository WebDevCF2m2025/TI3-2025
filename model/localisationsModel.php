<?php

/**
 * Recupère toutes les locations
 * @param PDO $connexion
 * @return array|false
 */
function getAllLocations(PDO $db): array|false
{
    try {
        $sql = "SELECT * FROM localisations ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $locations = $stmt->fetchAll();
        return $locations ?: false;
    } catch (PDOException $e) {
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
        return false;
    }
}
function addLocation(PDO $db, array $datas): bool
{
    // Vérification des champs requis
    if (
        !isset($datas['nom']) || trim($datas['nom']) === '' ||
        !isset($datas['adresse']) || trim($datas['adresse']) === '' ||
        !isset($datas['codepostal']) || trim($datas['codepostal']) === '' ||
        !isset($datas['ville']) || trim($datas['ville']) === '' ||
        !isset($datas['nb_velos']) || trim($datas['nb_velos']) === '' ||
        !isset($datas['latitude']) || trim($datas['latitude']) === '' ||
        !isset($datas['longitude']) || trim($datas['longitude']) === ''
    ) {
        return false;
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
        $prepare = $db->prepare($sql);
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
        return false;
    }
}

function updateLocationById(PDO $db, array $datas, int $idLocation): bool
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
        $prepare = $db->prepare($sql);
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
        return false;
    }
}


function getNbTotalLocation(PDO $db): int
{
    try {
        $query = $db->query('SELECT COUNT(*) as total FROM localisations');
        $messages = $query->fetch();
        $query->closeCursor();
        return (int) $messages['total'];
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


function getLocationPagination(PDO $db, int $offset, int $limit): array
{

    $prepare = $db->prepare(
        "SELECT * FROM localisations
        ORDER BY id ASC
        LIMIT ?,?"
    );
    try {
        // bindparam qui prend des valeurs qui pourront probablement changer
        $prepare->bindParam(1, $offset, PDO::PARAM_INT);
        $prepare->bindParam(2, $limit, PDO::PARAM_INT);
        $prepare->closeCursor();
        $prepare->execute();
        return $prepare->fetchAll();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}



//  Pagination
function pagination(int $nbtotalMessage, string $get = "page", int $pageActu = 1, int $perPage = 5): string
{
    $sortie = "";
    if ($nbtotalMessage === 0) return "";
    $nbPages = ceil($nbtotalMessage / $perPage);
    if ($nbPages == 1) return "";
    $sortie .= "<p class='pagination'>";
    for ($i = 1; $i <= $nbPages; $i++) {
        if ($i === 1) {
            if ($pageActu === 1) {
                $sortie .= "<< < 1 |";
            } elseif ($pageActu === 2) {
                $sortie .= " <a href='?page=admin'><<</a> <a href='?page=admin&'><</a> <a href='?page=admin'>1</a> |";
            } else {
                $sortie .= " <a href='?page=admin'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='?page=admin'>1</a> |";
            }
        } elseif ($i < $nbPages) {
            if ($i === $pageActu) {
                $sortie .= "  $i |";
            } else {
                $sortie .= "  <a href='?$get=$i'>$i</a> |";
            }
        } else {
            if ($pageActu >= $nbPages) {
                $sortie .= "  $nbPages > >>";
            } else {
                $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
            }
        }
    }
    $sortie .= "</p>";
    return $sortie;
}